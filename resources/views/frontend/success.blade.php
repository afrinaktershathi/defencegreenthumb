@extends('layout.frontend')
@section('content')

<div class="col-lg-5 mx-auto my-5">
    <div class="card">
        <div class="card-body text-center">
            <img src="https://cdn.dribbble.com/users/147386/screenshots/5315437/success-tick-dribbble.gif" alt=""
                class="w-75 m-auto d-block">
            <h2 class="text-center">Payment Successful</h2>
            <p class="text-center mt-1 mb-3">We will contact you soon....</p>
            <a href="{{ route('order.invoice.download', request()->id) }}"
                class="btn btn-success rounded-0 p-3 mb-3">Download Invoice</a>
        </div>

    </div>
</div>

@endsection