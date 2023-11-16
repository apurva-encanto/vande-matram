<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Vandemataram News</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Vandemataram News" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">


        <!-- Plugins css -->
        <link href="{{ asset('assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
	    <!-- Bootstrap css -->
	    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	    <!-- App css -->
	    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
	    <link href="{{ asset('assets/css/custom-style.css')}}" rel="stylesheet" type="text/css" />
	    <!-- icons -->
	    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
        @stack('custom-style')

	    <!-- Head js -->
	    <script src="{{ asset('assets/js/head.js')}}"></script>

    </head>

    <!-- body start -->
    <body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- Topbar Start -->

            @include('layouts.agent.topbar')

            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->

            @include('layouts.agent.leftsidebar')

            <!-- Left Sidebar End -->

             <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            @yield('content')

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


         @include('layouts.agent.footer')

    </body>

        @if ($message = Session::get('success'))
            <script>
                var title='{{ $message }}'

                Swal.fire({
                icon: "success",
                title: title,
                showConfirmButton: false,
                timer: 1500
                });

            </script>
     @endif
</html>
