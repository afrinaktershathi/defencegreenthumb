@extends('layout.frontend')

@section('content')
@push('customCssFrontend')
<link rel="stylesheet" href="{{ asset('assets/css/userProfile.css') }}">
@endpush
<section id="profileWrapper">
    <div class="container h-100">
        <div class="row h-100">
            <div class="m-auto  profileContainer">
                <div class="row h-100">
                    <div class="col-lg-3 profileMenu">
                        <ul>
                            {{-- <li><a href="#"> <span class="me-2"><i class="bi bi-pie-chart"></i></span>
                                    Dashboard</a>
                            </li> --}}
                            <li class="{{ request()->routeIs('profile') ? 'active' : null }}"><a href="#"><span
                                        class="me-2"><i class="bi bi-person"></i></span>Profile</a></li>
                            @role('user')
                            <li class="{{ request()->routeIs('myOrders') ? 'active' : null }}"> <a
                                    href="{{ route('myOrders') }}"><span class="me-2"><i
                                            class="bi bi-archive"></i></span> My
                                    Orders</a></li>
                            @endrole

                            @role('delivery-man')
                            <li class="{{ request()->routeIs('myOrders') ? 'active' : null }}"> <a
                                    href="{{ route('order.delivery.lists') }}"><span class="me-2"><i
                                            class="bi bi-archive"></i></span>Deliver Orders</a></li>
                            @endrole
                            <li class=""> <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.querySelector('#logout').submit()"><span
                                        class="me-2"><i class="bi bi-box-arrow-in-left"></i></span> Logout</a>
                                <form id="logout" action="{{ route('logout') }}" method="POST">
                                    @csrf</form>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 profileContent">
                        @yield('userProfile')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection