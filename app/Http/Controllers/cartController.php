<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    function addToCart($id)
    {
        $isExists = Cart::where(['food_id' => $id, 'customer_id' => auth('customer')->user()->id])->exists();

        if ($isExists) {
            $cart = Cart::where(['food_id' => $id, 'customer_id' => auth('customer')->user()->id])->first();
            $cart->qty = $cart->qty + 1;
        } else {
            $cart = new Cart();
            $cart->qty = 1;
            $cart->food_id = $id;
            $cart->customer_id = auth('customer')->id();
        }
        $cart->save();
        return back();
    }


    function viewCart()
    {
        $carts = Cart::with('food:id,title,price,image')->where('customer_id', auth('customer')->user()->id)->get();
        return view('frontend.cart', compact('carts'));
    }

    function updateCart(Request $request)
    {
        if ($request->qty) {
            foreach ($request->qty as $productId => $qty) {
                $cart = Cart::where(['food_id' => $productId, 'customer_id' => auth('customer')->user()->id])->first();
                $cart->qty = $qty;
                $cart->save();
            }
        }
        return back();
    }

    function deleteCart($id)
    {
        Cart::findOrFail($id)->delete();
        return back();
    }
}
