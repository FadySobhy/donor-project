<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('page-title', env('APP_NAME'))</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

        <!-- third party css -->
        <link href="{{ url('assets') }}/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- Plugins css -->
        <link href="{{ url('assets') }}/libs/jquery-nice-select/nice-select.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />

        <link href="{{ url('assets') }}/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert-->
        <link href="{{ url('assets') }}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- Tippy js-->
        <script src="{{ url('assets') }}/libs/tippy-js/tippy.all.min.js"></script>

        <link href="{{ url('assets') }}/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets') }}/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ url('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ url('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ url('assets') }}/css/app.min.css" rel="stylesheet" type="text/css"/>
        <style>
            .clear {
                clear: both;
            }
            .select2-container--default .select2-selection--single .select2-selection__placeholder {
                color: #afb8c0 !important;
            }
            .select2-container--default .select2-search--inline .select2-search__field::placeholder {
                color: #afb8c0 !important;
            }

            .select2-container .select2-selection--single .select2-selection__arrow {
                width: 11px;
                right: 7px;
            }

            .select2-container--default .select2-selection--single .select2-selection__clear {
                margin-right: 5px;
            }
        </style>
        @yield('styles')

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
                    <div class="container-fluid">
                        @yield('breadcrumb')
                        <div class="row">
                            <div class="col-12">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div> <!-- content -->

                @include('inc.footer')

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="{{ url('assets') }}/js/vendor.min.js"></script>

        <!-- third party js -->
        <script src="{{ url('assets') }}/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ url('assets') }}/libs/datatables/dataTables.bootstrap4.js"></script>
        <script src="{{ url('assets') }}/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="{{ url('assets') }}/libs/datatables/responsive.bootstrap4.min.js"></script>
        <script src="{{ url('assets') }}/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="{{ url('assets') }}/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="{{ url('assets') }}/libs/datatables/buttons.html5.min.js"></script>
        <script src="{{ url('assets') }}/libs/datatables/buttons.flash.min.js"></script>
        <script src="{{ url('assets') }}/libs/datatables/buttons.print.min.js"></script>
        <script src="{{ url('assets') }}/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="{{ url('assets') }}/libs/datatables/dataTables.select.min.js"></script>
        <script src="{{ url('assets') }}/libs/pdfmake/pdfmake.min.js"></script>
        <script src="{{ url('assets') }}/libs/pdfmake/vfs_fonts.js"></script>
        <!-- third party js ends -->

        <script src="{{ url('assets') }}/libs/jquery-nice-select/jquery.nice-select.min.js"></script>
        <script src="{{ url('assets') }}/libs/switchery/switchery.min.js"></script>
        <script src="{{ url('assets') }}/libs/multiselect/jquery.multi-select.js"></script>
        <script src="{{ url('assets') }}/libs/select2/select2.min.js"></script>
        <script src="{{ url('assets') }}/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
        <script src="{{ url('assets') }}/libs/autocomplete/jquery.autocomplete.min.js"></script>
        <script src="{{ url('assets') }}/libs/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="{{ url('assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="{{ url('assets') }}/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

        <script src="{{ url('assets') }}/libs/flatpickr/flatpickr.min.js"></script>
        <script src="{{ url('assets') }}/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="{{ url('assets') }}/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="{{ url('assets') }}/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

        <!-- Init js-->
        <script src="{{ url('assets') }}/js/pages/form-pickers.init.js"></script>

        <!-- Sweet Alerts js -->
        <script src="{{ url('assets') }}/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- Sweet alert init js-->
        <script src="{{ url('assets') }}/js/pages/sweet-alerts.init.js"></script>

        <!-- Datatables init -->
        <script src="{{ url('assets') }}/js/pages/datatables.init.js"></script>

        <script src="{{ url('assets') }}/libs/dropzone/dropzone.min.js"></script>
        <script src="{{ url('assets') }}/libs/dropify/dropify.min.js"></script>

        <!-- Init js-->
        <script src="{{ url('assets') }}/js/pages/form-fileuploads.init.js"></script>


        <!-- App js -->
        <script src="{{ url('assets') }}/js/app.min.js"></script>
        <script>
            $(document).ready(function(){
                $.validator.setDefaults({
                    errorClass: 'invalid-feedback',
                    errorElement: 'div',
                    errorPlacement: function(error, element){
                        $(element).closest('.form-group').append(error);
                    },
                    highlight: function (element) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element) {
                        $(element).removeClass('is-invalid');
                    },
                    success: function (label) {
                        $(label).closest('.form-group').find('.form-control').addClass('is-valid');
                    }
                });
            });
        </script>

        @yield('javascripts')

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

            function deleteObj(table, primaryCol, primaryValue, publishCol, alertLabel, redirectTo='', permanently='no', labelMsg='')
            {
                if(labelMsg === '') {
                    var warningMessage = "You want to delete this "+ alertLabel + "?";
                }else{
                    var warningMessage = labelMsg
                }
                swal.fire({
                    title: "{{ __('Are you sure!') }}",
                    text: warningMessage,
                    confirmButtonText: '{{ __('Yes, delete it') }}',
                    cancelButtonText: '{{ __('Cancel') }}',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33'
                }).then(function(isConfirmed) {
                    if (isConfirmed.dismiss === undefined && isConfirmed.value === true) {
                        var form = document.createElement('form');
                        form.setAttribute('method', 'post');
                        form.setAttribute('action', '{{ route('obj.delete') }}');
                        form.setAttribute('class', 'no-display');

                        var input = document.createElement('input');
                        input.setAttribute('type', 'hidden');
                        input.setAttribute('name', '_token');
                        input.setAttribute('value', '{{ csrf_token() }}');
                        form.append(input);

                        var tableInput = document.createElement('input');
                        tableInput.setAttribute('type', 'hidden');
                        tableInput.setAttribute('name', 'table');
                        tableInput.setAttribute('value', table);
                        form.append(tableInput);

                        var primaryColInput = document.createElement('input');
                        primaryColInput.setAttribute('type', 'hidden');
                        primaryColInput.setAttribute('name', 'col');
                        primaryColInput.setAttribute('value', primaryCol);
                        form.append(primaryColInput);

                        var primaryValueInput= document.createElement('input');
                        primaryValueInput.setAttribute('type', 'hidden');
                        primaryValueInput.setAttribute('name', 'value');
                        primaryValueInput.setAttribute('value', primaryValue);
                        form.append(primaryValueInput);

                        var publishColInput = document.createElement('input');
                        publishColInput.setAttribute('type', 'hidden');
                        publishColInput.setAttribute('name', 'publish');
                        publishColInput.setAttribute('value', publishCol);
                        form.append(publishColInput);

                        var redirectInput = document.createElement('input');
                        redirectInput.setAttribute('type', 'hidden');
                        redirectInput.setAttribute('name', 'redirect');
                        redirectInput.setAttribute('value', redirectTo);
                        form.append(redirectInput);

                        var prementlyInput = document.createElement('input');
                        prementlyInput.setAttribute('type', 'hidden');
                        prementlyInput.setAttribute('name', 'permanently');
                        prementlyInput.setAttribute('value', permanently);
                        form.append(prementlyInput);

                        var labelInput = document.createElement('input');
                        labelInput.setAttribute('type', 'hidden');
                        labelInput.setAttribute('name', 'label');
                        labelInput.setAttribute('value', alertLabel);
                        form.append(labelInput);

                        $('body').append(form);
                        form.submit();
                    }
                });
            }
        </script>

    </body>
</html>
