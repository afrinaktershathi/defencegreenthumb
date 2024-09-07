<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="{{asset('assets/css/index.css')}}" rel="stylesheet">
  @stack('customCssFrontend')
  <title>GreenThumb</title>
</head>

<body>
  <!--navbar starts-->
  <nav class="navbar topnav navbar-expand-lg bg-body-tertiary d-none d-lg-block">
    <div class="container-fluid justify-content-lg-between">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('assets/img/isolated-monochrome-black.svg')}}" height="100%" width="100px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    

      <div class="navLinks">
        <div class="navitems d-flex">
          <a href="{{ route('home') }}" class="active">Home</a>

          <div class="dropdown">
            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            @if (count($categories) > 0)
            <ul class="dropdown-menu" style="z-index: 50">
                
              @foreach ($categories as $category)
              
              <li><a class="dropdown-item text-start" href="{{ route('category.archeive',$category->id) }}">{{ $category->title }}</a></li>
              @endforeach
              
            </ul>
            @endif
          </div>
          <a href="{{ route('contactus') }}">Contact</a>
          <a href="{{ route('aboutus') }}">About</a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
          <a class="text-dark" href="{{ route('profile') }}">Profile</a>
          <a href="{{ route('cart.details') }}"><span class="badge" style="background-color: #7C9087;"><strong class="text-light btn btn-sm">{{ $count }}</strong> products</span></a>
        </div>
      </div>


    </div>
  </nav>

  {{-- NAVBAR SM --}}
  <nav class="py-4 d-lg-none">
    <div class="container">
      <div class="row align-items-center">

        <div class="menu col-2 end">
          <a class="text-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample">
            <span><i class="bi bi-list-nested"></i></span>
          </a>


          <div class="offcanvas sidebarSm offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="searchArea">
              <form action="">
                <input type="text" placeholder="Search...">
                <span><i class="fa-solid fa-magnifying-glass"></i></span>
              </form>
            </div>

            <div class="navLinks  text-start mt-4">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About</a></li>
              </ul>
            </div>


          </div>
        </div>
        <div class="logo col text-center">
          <a class="navbar-brand" href="#">
            <img src="{{asset('assets/img/isolated-monochrome-black.svg')}}" height="100%" width="100px">
          </a>
        </div>

        <div class="col-3 text-end">
          <div class="quickLinks">
            <ul class="d-flex justify-content-end">
              <li class="mx-2"><a class="text-dark" href="#"><i class="fa-regular fa-user"></i></a></li>
              <li class="mx-2"><a class="text-dark" href="#"><i class="fa-regular fa-heart"></i></i></a></li>
              <li class="mx-2"><a class="text-dark" href="#"><i class="bi bi-bag"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  {{-- NAVBAR SM END --}}


  <!--navbar ends-->

  @yield('content')


  <!--footer-->

  <div class="footer">

    <div class="container">
      <div class="row align-items-lg-center">
        <div class="col-lg  col-6 order-2 order-lg-1">
          <div class="foot">
            <h5>Opening time</h5>
            <p>Monday-Friday: 9:00am-5:00pm</p>
            <p>Saturday: 10:00am-2:00pm</p>
            <p>Sunday: Closed</p>
          </div>
        </div>
        <div class="col-lg  col-6 order-3 order-lg-2">
          <div class="foot">
            <h5>Information</h5>
            <a href="#">About us</a>
            <a href="#">Contact us</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
          </div>
        </div>
        <div class="col-lg-4  order-1 order-lg-3 text-center">
          <div class="foot3">
            <img src="{{ asset('assets/img/isolated-monochrome-white.svg') }} " class="w-50">
          </div>
        </div>
        <div class="col-lg  col-6 order-4 mt-3 mt-lg-0">
          <div class="foot">
            <h5>Follow us</h5>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
            <a href="#">Youtube</a>
          </div>
        </div>
        <div class="col-lg  col-6 order-5 mt-3 mt-lg-0">
          <div class="foot">
            <h5>Contact us</h5>
            <a href="#">+254700000000</a>
            <a href="#">+254700000000</a>
            <a href="#">+254700000000</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <p>{{ env('APP_NAME') }} Created by Afrin </p>
  </div>

  <!--footer ends-->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <script src="{{asset('assets/js/index.js')}}"></script>

  @stack('frontend_js')
</body>

</html>