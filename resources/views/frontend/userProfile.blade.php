@extends('layout.UserProfileLayout')
@section('userProfile')
<h2>My profile</h2>

<form action="{{ route('user.profile.update', auth()->user()->id) }}" method="POST">
    @csrf

    <div class="row my-3">
        <div class="col-md-6"><input name="name" value="{{ auth()->user()->name }}" placeholder="User Name" type="text" class="form-control"></div>
        <div class="col-md-6"><input  name="email" value="{{ auth()->user()->email }}" placeholder="Email" type="text" class="form-control"></div>
    </div>
    <textarea name="address" class="form-control" placeholder="Address">{{auth()->user()->address}}</textarea>
    <div class="row my-3">
        <div class="col-md-6"><input  name="phone"  value="{{ auth()->user()->phone }}"  placeholder="Phone" type="text" class="form-control"></div>
        
        <div class="col-md-6"><input  name="zip" value="{{ auth()->user()->zip }}" placeholder="Post Code" type="text" class="form-control"></div>
    </div>
    <button class="btn-general">Update Profile</button>

</form>

@endsection