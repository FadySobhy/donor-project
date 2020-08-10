<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('page-title', env('APP_NAME'))</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href={{ asset('assets/images/favicon.ico')}}>

        <!-- Plugins css -->
        <link href={{ asset('assets/libs/flatpickr/flatpickr.min.css')}} rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href={{ asset('assets/css/bootstrap.min.css')}} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/css/icons.min.css')}} rel="stylesheet" type="text/css" />
        <link href={{ asset('assets/css/app.min.css')}} rel="stylesheet" type="text/css" />

    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">

        @include('inc.top_bar')

        @include('inc.left_sidebar')

        <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    @yield('content')
                </div> <!-- content -->

                @include('inc.footer')

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        @include('inc.right_sidebar')

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{ asset('assets/libs/flot-charts/jquery.flot.js')}}"></script>
        <script src="{{ asset('assets/libs/flot-charts/jquery.flot.time.js')}}"></script>
        <script src="{{ asset('assets/libs/flot-charts/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{ asset('assets/libs/flot-charts/jquery.flot.selection.js')}}"></script>
        <script src="{{ asset('assets/libs/flot-charts/jquery.flot.crosshair.js')}}"></script>
        <script src="{{ url('assets') }}/libs/sweetalert2/sweetalert2.min.js"></script>


        <!-- App js-->
        <script src="{{ asset('assets/js/app.min.js')}}"></script>

        <script>
            function logout()
            {
                Swal.fire({
                    title:"Are you sure?",
                    text:"You want to logout!",
                    type:"question",
                    showCancelButton:!0,
                    confirmButtonColor:"#3085d6",
                    cancelButtonColor:"#d33",
                    confirmButtonText:"Yes, logout!"
                }).then(function(t){
                    if(t.value){
                        var formElement = document.createElement('form');
                        formElement.setAttribute('action', '{{ route('logout') }}');
                        formElement.setAttribute('method', 'post');

                        var tokenElement = document.createElement('input');
                        tokenElement.setAttribute('name', '_token');
                        tokenElement.setAttribute('value', '{{ csrf_token() }}');
                        tokenElement.setAttribute('type', 'hidden');

                        formElement.append(tokenElement);

                        $("body").append(formElement);

                        formElement.submit();
                    }
                });
            }
        </script>

    </body>
</html>
