<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = "/admin/dashboard";


    function showLoginForm()
    {
        return view('auth.AdminLogin');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
