<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function products()
    {
        $products = Product::with("categories")->latest()->get();
        $categories = Category::get();
        $editedProducts = null;

        return view('backend.products', compact('products', 'categories', 'editedProducts'));
    }
    function editProducts($id)
    {
        $editedProducts = null;
        $products = Product::latest()->get();
        if ($id) {

            $editedProducts = Product::with(['categories:id', 'stocks'])->find($id);
        }
        $categories = Category::get();
        
        return view('backend.products', compact('products', 'editedProducts', 'categories'));
    }
    function deleteProducts($id)
    {
        Product::find($id)->delete();
        return back();
    }

    function saveProducts(Request $req, $id = null)
    {


        $req->validate([
            'name' => 'required|unique:products,name,' . $id,
            'price' => 'required',
            'details' => 'required'
        ]);


        $products = Product::findOrNew($id);
        $products->name = $req->name;
        $products->price = $req->price;
        $products->detials = $req->details;
        if ($req->hasFile('image')) {
            $fileName = $req->image->store('products',  'public');
            $products->image = $fileName;
        }
        $products->stock = $req->stock == 1 ? true : false;
        $products->save();
        if ($req->qty) {


            Stock::updateOrCreate([
                'product_id' => $products->id
            ], [
                'product_id' => $products->id,
                'stock' => $req->qty,
                'threshold' => $req->threshold
            ]);
        }


        $products->categories()->sync($req->categories);
        return back();
    }

    function updatedFeatured($id)
    {

        $product = Product::find($id);
        $product->featured =  !$product->featured;
        $product->save();
        return back();
    }
}
