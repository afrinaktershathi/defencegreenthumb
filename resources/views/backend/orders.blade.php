@extends('layout.backendlayout')

@section('content')

<div class="container mt-4">
  <!-- ========== title-wrapper start ========== -->
  <div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title">
          <h2>Orders
          </h2>
        </div>
      </div>
      <!-- end col -->

    </div>
    <table class="table table-responsive">
      <tr>
        <th>#</th>
        <th>Order Details</th>
        <th>Total Items</th>
        <th>Status</th>
        <th></th>
      </tr>
      @foreach ($orders as $key=>$order)
      <tr>
        <td>{{ $orders->firstItem() + $key}}</td>
        <td style="width: 40%">
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
          <span
            class="btn btn-{{ $order->status == 'Processing' || $order->status == 'Complete' ? 'primary' : 'danger' }} btn-sm">
            @if ($order->status == 'Processing' || $order->status == 'Complete')
            Payment Complete
            @else
            Payment Pending
            @endif
          </span>
        </td>
        <td>
          <div class="btn-group">
            @if ($order->status == 'Pending' || $order->status == 'Fail')
            <a href="{{ route('order.cancel', $order->id) }}" class="btn btn-sm btn-danger">Cancel</a>
            <a href="{{ route('order.complete', $order->id) }}" class="btn btn-sm btn-success">Complete</a>
            
            @endif
          </div>
        </td>
      </tr>
      @endforeach
    </table>
    <!-- end row -->
  </div>
  <!-- ========== title-wrapper end ========== -->


</div>
@endsection