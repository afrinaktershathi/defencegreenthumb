<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>

<body>


    <div class="wrapper d-flex">

        <section class="m-auto">
            <div class="row h-100">
                <div class="banner col-lg-6" style="background: url({{ asset('assets/img/AuthBanner.jpg') }})"></div>
                <div class="col-lg-6 authForms">
                    <div class="row h-100 align-items-center">
                        <div class="cnt">@yield('authContent')</div>
                    </div>
                </div>
            </div>
        </section>

    </div>



</body>

</html>