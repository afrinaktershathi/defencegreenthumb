@extends('layout.UserProfileLayout')
@section('userProfile')
<h2>Delivery Lists</h2>

<table class="table table-responsive">
    <tr>
        <th>#</th>
        <th>Order Details</th>
        <th>Total Items</th>
        <th> </th>
    </tr>
    @foreach ($orders as $key=>$order)
    <tr>
        <td>{{ $orders->firstItem() + $key}}</td>
        <td width="60%">
            Customer Name: <b> {{ $order->name }}</b>
            <br>
            Phone: <b>{{ $order->phone }}</b> <br>
            Email: <b>{{ $order->email }}</b> <br>
            @if ($order->state)
            <p>State: <b>{{ $order->state }}</b></p>
            @endif
            <p class="m-0">Address: {{ $order->address }}</p>
            @if ($order->address2)

            <p>Address2: {{ $order->address2 }}</p>
            @endif
            <b>Total Order Price: {{ $order->total_price }}tk</b>

            @foreach ($order->orderItems as $item)
            <div class="row my-2 align-items-center">
                <div class="col-lg-2">
                    <img src="{{ asset('storage/'.$item->products?->image) }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-10">
                    <p>{{ str($item->products->name)->headline() }} * ({{ $item->qty }} * {{ $item->price }} tk)</p>
                    <p><b>Item price: {{ $item->price * $item->qty }}tk</b></p>
                </div>
            </div>
            @endforeach


        </td>
        <td>{{ $order->qty }}</td>
        <td>
            <div class="text-center ">
                {{-- {{ dd(session()->has('opt')) }} --}}



                @if ($order->status != 'Delivering')
                <a href="{{ route('order.delivery.confirm', $order->id) }}" class="btn btn-sm btn-dark ">Take
                    Delivery</a>

                @else
                @if ($order->delivery_id == auth()->id())
                <a href="{{ route('order.delivery.otp', $order->phone) }}" class="btn btn-sm btn-dark mb-2">Send
                    OPT</a>

                <a href="{{ route('order.delivery.mark', $order->id) }}" class="btn btn-sm btn-dark mb-2">Mark as
                    Delivered</a>
                @endif

                @if (session()->has('otp'))
                <p>Your OTP is {{ session('otp') }}</p>
                @endif
                @endif
            </div>
        </td>

    </tr>
    @endforeach
</table>
@endsection