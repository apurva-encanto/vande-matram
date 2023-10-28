<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Vandemataram News</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="" name="description" />
        <meta content="Vandemataram News" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}" />

        <!-- Plugins css -->
        <!-- Bootstrap css -->
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
        <!-- icons -->
        <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.css" />
    </head>

    <body>
        <div class="row">
            <div class="col-md-2 px-3"  >
                <div class="card bg-light" style="height: 500px;">
                    <div class="card-body">
                        Responsive Advertisement
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Top Header -->
                <div class="top-header bg-dark mb-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 background">
                                Apps:
                            </div>
                            <div class="col-sm-4 background">
                                Follow us on:
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-facebook icon-dual"
                                >
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-twitter icon-dual"
                                >
                                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                </svg>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-youtube icon-dual"
                                >
                                    <path
                                        d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"
                                    ></path>
                                    <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                                </svg>
                            </div>
                            <div class="col-sm-4 background">
                                Login
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('assets/images/logo-light.png')}}" alt="" />
                    </div>
                    <div class="col-md-8">
                        <div class="card bg-light">
                            <div class="card-body">
                                Responsive Advertisement
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navbar  -->
                @include('layouts.front.categories')
                @include('layouts.front.flash-news')                

              @yield('main-content')
            </div>
            <div class="col-md-2 px-3">
                <div class="card bg-light"  style="height: 500px;">
                    <div class="card-body">
                        Responsive Advertisement
                    </div>
                </div>
            </div>
        </div>

        <footer class="py-5 bg-dark mt-2">
            <div class="mx-5">
                <div class="d-flex flex-column flex-sm-row justify-content-between border-bottom">
                    <img src="{{asset('assets/images/logo-light.png')}}" alt="" />
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.
                    </p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3">
                            <a class="link-dark" href="#">
                                <div class="icon-item">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-facebook icon-dual"
                                    >
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>
                                </div>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="link-dark" href="#">
                                <div class="icon-item">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-twitter icon-dual"
                                    >
                                        <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                    </svg>
                                </div>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="link-dark" href="#">
                                <div class="icon-item">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-youtube icon-dual"
                                    >
                                        <path
                                            d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"
                                        ></path>
                                        <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                                    </svg>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-6 col-md-2">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                        </ul>
                    </div>

                    <div class="col-md-5 offset-md-1 mb-3">
                        <form>
                            <h5>Subscribe to our newsletter</h5>
                            <p>Monthly digest of what's new and exciting from us.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Email address" />
                                <button class="btn load-btn" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </footer>

    </body>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            var owl = $(".owl-carousel");
            owl.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                items: 1,
                dots: false,
                autoplay: true,
                autoPlaySpeed: 5000,
                autoPlayTimeout: 5000,
                autoplayHoverPause: true,
            });

            // Custom Button
            $(".customNextBtn").click(function () {
                owl.trigger("next.owl.carousel");
            });
            $(".customPreviousBtn").click(function () {
                owl.trigger("prev.owl.carousel");
            });
        });
    </script>
</html>
