<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Vandemataram News</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Live your life the way you want and where you feel most comfortable in your own home. Transitions in life require essential decisions. You dont have to relocate your loved ones from their homes." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- Bootstrap css -->
		<link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
		<!-- App css -->
		<link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
		<!-- icons -->
		<link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
		<!-- Head js -->
		<script src="{{ asset('assets/js/head.js')}}"></script>

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center m-auto" style="">
                                    <a href="{{url('/')}}">
                                        <img src="{{asset('assets/images/logo-light.png')}}"/>
                                    </a>
                                </div>

                       <div>
                                    <h4 class="mb-4 mt-3">Change Password</h4>
                                </div>

                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <form id="newPassword" action="{{ route('admin.passwordChange') }}" method="post" class=" mb-4 mt-3">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $_GET['email'] }}">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input class="form-control" type="password" required id="password"  name="password" value="{{ old('password') }}" placeholder="Password">
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Confirm Password</label>
                                        <input class="form-control" type="password" required id="cemailaddress"  name="confirm_password" value="{{ old('confirm_password') }}" placeholder="Confirm Password">
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                    </div>


                                    <div class="text-center d-grid ">
                                        <button class="btn btn-primary" type="submit" > Send Email </button>
                                    </div>

                                </form>

                                <a href="{{url('/login')}}">Already a Member ? Login</a>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="{{url('/login')}}" class="text-white ms-1">Already a Member ? Login</a></p>
                                {{-- <p class="text-white">Don't have an account? <a href="signin-signup.html" class="text-white ms-1"><b>Sign Up</b></a></p> --}}
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt text-white">
            <script>document.write(new Date().getFullYear())</script> &copy;  Vandemataram News. All Rights Reserved.
        </footer>

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js')}}"></script>

        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
 <script>
 $(document).ready(function($) {





				$("#newPassword").validate({
                rules: {
                    password:  {
                            required: true,
                            minlength: 6 ,
                            },
                            confirm_password: {
                                required: true,
                                minlength: 6,
                                equalTo: "#password"
                            }
                },
                messages: {
                    password: {
                        required: "Password is required",
                    },
                    confirm_password:{
                        required: "Confirm Password is required",

                    }
                },
                 errorPlacement: function(error, element)
        {
            if ( element.is(":radio") )
            {
                error.appendTo( element.parents('.form-group') );
            }
            else
            { // This is the default behavior
                error.insertAfter( element );
            }
         },
                submitHandler: function(form) {
                    form.submit();
                }

            });
    });
 </script>

    </body>
</html>
