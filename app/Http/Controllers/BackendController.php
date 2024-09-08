<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    function dashboard()
    {
        $users = User::where('status', 0)->whereHas('roles', function ($q) {
            $q->where('name', 'delivery-man');
        })->get();

        return view('backend.dashboard', compact('users'));
    }

    function approve($id)
    {
        $user = User::findOrFail($id);
        $user->status = true;
        $user->save();
        return back();
    }
    function denied($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back();
    }
}
