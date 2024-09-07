@extends('layout.AuthLayouts')
@section( 'title', 'Register Page')
@section('authContent')
<h3>Register</h3>
<form action="{{ route('register') }}" method="post">
    @csrf
    <input class="my-3" type="text" placeholder="User Name" name="name" required>
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    <input class="my-3" type="email" placeholder="Email" name="email" required>
    @error('email')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    <input class="my-3" type="password" placeholder="Password" name="password" required>
    @error('password')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    <input class="my-3" type="password" placeholder="Confirm Password" name="password_confirmation" required>


    <select name="role" class="form-control mb-3">
        <option value="user">User</option>
        <option value="delivery-man">Delivery Man</option>
    </select>

    <button class="btn-general w-100">Create a new Account</button>
    <a href="{{ route('login') }}" class="text-center d-block mt-2 text-dark">Already have an account?</a>
</form>
@endsection