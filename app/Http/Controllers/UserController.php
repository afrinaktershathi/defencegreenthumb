<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function updateUser(Request $request,$id) {
        // dd($request->all());
        User::find($id)->update([
            'name'=>  $request->name,
            'email'=>  $request->email,
            'phone'=>  $request->phone,
            'zip'=>  $request->zip,
            'address'=>  $request->address,
        ]);
        return back();
    }
}
