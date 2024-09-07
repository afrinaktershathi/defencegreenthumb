@extends('layout.frontend')
@section('content')



<div class="container">
    <div class="col-lg-8 mx-auto mt-5">
        <div class="card bg-dark text-white">
            <div class="card-header py-4">
                <h5>Cart Items</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf

                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr class="text-center">
                                <th>#</th>
                                <th class="text-start ps-3">Food Item</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                            @php
                            $total = 0;
                            @endphp
                            @forelse ($carts as $key=>$item)
                            <tr class="text-center">
                                <td>{{ ++$key }}</td>
                                <td class="text-start"> <img src="{{ asset('storage/'.$item->food->image) }}"
                                        width="100" alt="{{ $item->food->title }}"> {{ $item->food->title }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" data-id="#foodQuantity{{ $item->id }}"
                                            class="btn btn-sm btn-primary counter_btn" data-type="dec">-</button>
                                        <input type="text" size="2" value="{{ $item->qty }}"
                                            name="qty[{{ $item->food->id }}]"
                                            class="form-control text-center rounded-0">
                                        <button type="button" data-id="#foodQuantity{{ $item->id }}"
                                            class="btn btn-sm btn-primary counter_btn" data-type="inc">+</button>
                                    </div>
                                </td>
                                <td>
                                    {{ $price = $item->food->price * $item->qty }} tk
                                </td>
                                <td>
                                    <a href="{{ route('cart.delete', $item->id) }}" class="text-danger"><i
                                            class="fa-regular fa-circle-xmark"></i></a>
                                </td>

                            </tr>
                            @php
                            $total += $price
                            @endphp
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No Food Found! <a href="{{ route('menu.show') }}" class="text-warning">Go To Menu!</a></td>
                            </tr>
                            @endforelse
                            @if (count($carts) > 0)

                            <tr>
                                <td colspan="3">
                                    <h5>Total price:</h5>
                                </td>
                                <td class="text-center">
                                    <h4>{{ $total }} tk</h4>
                                </td>

                            </tr>
                            @endif
                        </table>
                    </div>
                    @if (count($carts) > 0)
                    <div class="text-end">
                        <button class="btn rounded-0 text-dark" style="font-weight: 600">Update Cart</button>
                        <a class="btn rounded-0 text-dark" style="font-weight: 600" href="{{ route('checkout.view') }}">Proceed to Checkout</a>
                    </div>
                    @endif
                </form>

            </div>
        </div>
    </div>
</div>



@endsection

@push('customJs')
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