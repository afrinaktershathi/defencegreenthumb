<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    function downloadInvoice($id) {
        $order = Order::with('orderItems.products')->where('id', $id)->first();
        // dd($order);
        $data = compact('order');
        $pdf = Pdf::loadView('invoice.PurchaseInvocie', $data);
        return $pdf->download('invoice.pdf');

    }

    function sendOTP($phone)
    {

        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "MFyeAekV5m2fofdpgFFq";
        $senderid = "8809617620259";
        $number = $phone;
        $opt = fake()->randomNumber(5);
        $message = "Your OPT code is " . $opt;
        session(['otp' => $opt]);


        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        // return $response;
        return back();
    }

    function markAsDelivered($id)
    {
        $order = Order::findOrFail($id);
        $order->status = "Delivered";
        $order->save();
        return back();
    }
}
