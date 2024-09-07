@extends('layout.AuthLayouts')
@section( 'title', 'Login Page')
@section('authContent')
<h3>Login</h3>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <input class="my-3" type="email" placeholder="Email" name="email" required>
    @error('email')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    <input class="my-3" type="password" placeholder="Password" name="password" required>
    @error('password')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    <button class="btn-general w-100">Login</button>
    <a href="{{ route('register') }}" class="text-center d-block mt-2 text-dark">Don't have an account ?</a>
</form>
@endsection