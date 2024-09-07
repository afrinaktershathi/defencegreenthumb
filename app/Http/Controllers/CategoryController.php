<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function showCategory()
    {
        $categories = Category::get();
        return view('backend.category', compact('categories'));
    }

    function  editCategory($id)
    {
        $editedCategory = Category::find($id);
        $categories = Category::get();
        return view('backend.category', compact('categories', 'editedCategory'));
    }

    function saveCategory(Request $request, $id = null)
    {

        $request->validate([
            'title' => 'required|unique:categories,title,' . $id
        ]);

        $category = Category::findOrNew($id);
        $category->title = $request->title;
        $category->slug  = str()->slug($request->title);
        $category->save();
        return back();
    }

    function deleteCategory($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.save');
    }
}
