@extends('layout.frontend')
@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img class="img-fluid" src="{{ asset('storage/'.$product->image) }}" alt="">
                </div>
                <div class="col-lg-8">
                    <h4>{{ $product->name }}</h4>
                    <span>{{ $product->price }} $ </span>

                    <div class="details mt-3">
                        <p>{{ $product->detials }}</p>
                        @if ($product->stock)

                        <div class="btn-group">
                            <a class="btn btn-primary mt-3" href="{{ route('cart.add', $product->id) }}">Add to Cart</a>
                        </div>
                        @else
                        <h4 class="text-danger mt-3">Out of stock</h4>
                        @endif
                    </div>
                </div>
            </div>

            <h4 class="my-4">Related product</h4>

            <div class="row">
                @forelse ($filteredProducts as $relatedProduct)
                <div class="col-lg-3">
                    <div class="card">
                        <img class="img-fluid " src="{{ $relatedProduct->image }}" alt="">
                        <div class="card-body mt-2">
                            <h4>{{ $relatedProduct->name }}</h4>
                            <span>{{ $relatedProduct->price }}$</span>
                            <p>{{ Str::limit($relatedProduct->detials, 30, '...') }} </p>

                            

                            <a href="{{ route('product.show', $relatedProduct->id) }}" class="btn btn-primary w-100 mt-3">View Details</a>
                        </div>
                    </div>
                </div>
                @empty
                    <h1>no data found!</h1>
                @endforelse
               
            </div>
        </div>
    </section>
@endsection


