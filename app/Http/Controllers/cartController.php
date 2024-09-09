<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    function addToCart($id)
    {
        $isExists = Cart::where(['product_id' => $id, 'customer_id' => auth('customer')->user()->id])->exists();
        $products = Stock::where('product_id', $id)->first();
        if ($products->stock > 0) {
            if ($isExists) {
                $cart = Cart::where(['product_id' => $id, 'customer_id' => auth('customer')->user()->id])->first();
                $cart->qty = $cart->qty + 1;
            } else {
                $cart = new Cart();
                $cart->qty = 1;
                $cart->food_id = $id;
                $cart->customer_id = auth('customer')->id();
            }
            $cart->save();
        }
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
                $products = Stock::where('product_id', $productId)->first();
                if ($qty < $products->stock) {
                    $cart = Cart::where(['product_id' => $productId, 'customer_id' => auth('customer')->user()->id])->first();
                    $cart->qty = $qty;
                    $cart->save();
                } else {
                    return back()->with('No more stocks available!');
                }
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
