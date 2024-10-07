@extends('layout.frontend')
@section('content')
<section class="my-5">
    <div class="container">





        <form action="{{ route('cart.details.update') }}" method="post">
            @csrf
            @method('put')





            <table class="table">
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

                @php
                $total = 0
                @endphp

                @forelse ($cartDetails as $cart)
                @php
                $total += $cart->products->price * $cart->qty;
                @endphp
                <tr>
                    <td>{{ $cart->id }}</td>
                    <td>{{ $cart->products->name }} ({{ $cart->products->price }} tk)</td>
                    <td>





                        <div class="btn-group">
                            <button type="button" data-id="#foodQuantity{{ $cart->id }}"
                                class="btn btn-sm btn-primary counter_btn" data-type="dec">-</button>
                            <input type="text" size="2" value="{{ $cart->qty }}" name="qty[{{ $cart->id }}]"
                                class="form-control text-center rounded-0">
                            <button type="button" data-id="#foodQuantity{{ $cart->id }}"
                                class="btn btn-sm btn-primary counter_btn" data-type="inc">+</button>
                        </div>

                        @if (session()->has('msg'))
                        <p class="text-danger">{{ session('msg') }}</p>
                        @endif
                    </td>
                    <td>{{ $cart->products->price * $cart->qty }}</td>
                    <td>
                        <a href="{{ route('cart.details.delete', $cart->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>



                @empty

                @endforelse

                <tr>
                    <td colspan="4">
                        <h4>Total Price : </h4>
                    </td>
                    <td><b>{{ $total }} tk</b></td>
                </tr>
            </table>














            <div class="update  d-flex justify-content-end">
                <div class="gx-5">
                    <button class="border-0 btn btn-primary" style="background: #7C9087;">Update</button>
                    <a href="{{ route('checkout') }}" style="background: #7C9087;"
                        class="border-0 btn btn-primary">Checkout</a>
                        <!-- update part for COD -->
                        <a href="{{ route('checkoutCodView') }}" style="background: #7C9087;"
                        class="border-0 btn btn-primary">Cash on Delivery</a>
                </div>
            </div>
        </form>
    </div>
</section>


@push('frontend_js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'
    integrity='sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=='
    crossorigin='anonymous'></script>
<script>
    $('.counter_btn').click(function(){
        let type = $(this).attr('data-type');
        let value = $(this).parent().children('input').val()
        
            if(type == 'inc'){
                let newVal = Number(value) + 1;
                $(this).parent().children('input').val(newVal)
                let qtyInput = $(this).attr('data-id')
                $(qtyInput).val(newVal)
            } else{
                    if(value <= 1){ return false; } 
                    let newVal=Number(value) - 1; 
                    $(this).parent().children('input').val(newVal) 
                    let qtyInput=$(this).attr('data-id') 
                    $(qtyInput).val(newVal) 
                } 
        })
</script>
@endpush
@endsection