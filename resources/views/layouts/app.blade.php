<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME', 'Donor') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href={{ asset('assets/images/favicon.ico')}}>

    <!-- App css -->
    <link href={{ asset('assets/css/bootstrap.min.css')}} rel="stylesheet" type="text/css" />
    <link href={{ asset('assets/css/icons.min.css')}} rel="stylesheet" type="text/css" />
    <link href={{ asset('assets/css/app.min.css')}} rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            @yield('content')
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


<footer class="footer footer-alt">
    {{ date('Y') }} - {{ (int) date('Y') + 1 }} &copy;  <a href="javascript:void(0);" class="text-white-50">{{ env('APP_NAME', 'DONOR"') }}</a>
</footer>

<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.min.js')}}"></script>

</body>
</html>
