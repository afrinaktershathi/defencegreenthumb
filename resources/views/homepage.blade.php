@extends('layout.frontend')
@section('content')



<!--second section-->
<section id="banner">
  <a href="#">
    <div class="section1" style="background-image: url({{ asset('assets/img/bannerhd.png') }});">

    </div>
  </a>
</section>
<!--second section ends-->

<!--featured cards-->


<section>
  <h2 class="display-1  mx-auto mt-5" id="chead" style="margin-top: 40px; margin-bottom:40px">Featured Item</h2>


  <div class="container">
    <div class="row">

      @foreach ($featuredProducts as $product)


      <div class="col-lg-4 col-xl-3 col-6">
      
        <div class="card mt-2 mx-2">
          <img class="card-img-top" style="width:100%;height:250px; object-fit:cover; object-position:center" src="{{ asset('storage/'.$product->image) }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $product->name }} </h5>
            <p class="card-text">{{ Str::limit($product->detials, 100, '...') }}</p>
            @if($product->stock != 1)
            <p class="text-danger">(Out of stock)</p>
            @endif
            
            <a href="{{ route('product.show', $product->id) }}" class="btn" style="background-color: rgba(124,144,135,255); color:white">View more</a>
          </div>
        </div>
      </div>
      @endforeach




    </div>
  </div>
</section>

<!--cfeatured ards ends-->


<section>
  <!--categories cards-->


  <h2 class="display-1  mx-auto mt-5" id="chead" style="margin-top: 40px; margin-bottom:40px">New Products</h2>

  <div class="container">
    <div class="row">


      @foreach ($products as $product)
      
      
      <div class="col-lg-4 col-xl-3 col-6">
      
        <div class="card mt-2 mx-2">
          <img class="card-img-top" style="width:100%;height:250px; object-fit:cover; object-position:center" src="{{ asset('storage/'.$product->image) }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ Str::limit($product->detials, 100, '...') }}</p>
            @if($product->stock != 1)
            <p class="text-danger">(Out of stock)</p>
            @endif
            <a href="{{ route('product.show', $product->id) }}" class="btn" style="background-color: rgba(124,144,135,255); color:white">View more</a>
          </div>
        </div>
      </div>
      @endforeach



    </div>
  </div>
  <!--categories card ends-->
</section>


@endsection