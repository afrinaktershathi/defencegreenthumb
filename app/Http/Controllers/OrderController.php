<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use Twilio\Rest\Client;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    function orders()
    {
        $orders = Order::with('orderItems.products')->latest()->paginate(20);
        // dd($orders);
        return view('backend.orders', compact('orders'));
    }
    function ordersComplete($id)
    {
        $order = Order::find($id);
        $order->status = "Complete";
        $order->save();
        return back();
    }
    function orderCancel($id)
    {
        $order = Order::find($id);

        $order->delete();
        return back();
    }

    function myOrders()
    {
        $orders = Order::where('user_id', auth()->id())->with('orderItems.products')->latest()->paginate(20);
        return view('frontend.myOrders', compact('orders'));
    }

    function orderLists()
    {
        $orders = Order::whereIn('status', ['Processing', 'Complete', 'Delivering'])->latest()->paginate(20);
        return view('frontend.DeliveryOrderLists', compact('orders'));
    }

    function deliveryConfirm($id)
    {
        $order = Order::findOrFail($id);
        $order->status = "Delivering";
        $order->delivery_id = auth()->user()->id;
        $order->save();
        return back();
    }


    function sendOTP()
    {
        $receiverNumber = '+880 1997 492233'; // Replace with the recipient's phone number
        $message = 'your order hasbeen placed'; // Replace with your desired message

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $fromNumber = env('TWILIO_FROM');

        try {
            $client = new Client($sid, $token);
            $client->messages->create($receiverNumber, [
                'from' => $fromNumber,
                'body' => $message
            ]);

            return 'SMS Sent Successfully.';
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
