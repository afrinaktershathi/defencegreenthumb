@extends('layout.frontend')
@section('content')
<section id="archeive" class="my-5">
    <div class="container">
        <h2 class="mb-4">{{ $category->title }}</h2>

        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-4 col-xl-3 col-6">

                <div class="card mt-2 mx-2">
                    <img class="card-img-top" style="width:100%;height:250px; object-fit:cover; object-position:center" src="{{ asset('storage/'.$product->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->detials, 100, '...') }}</p>
                        <a href="{{ route('product.show', $product->id) }}" class="btn"
                            style="background-color: rgba(124,144,135,255); color:white">View more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div>
</section>
@endsection