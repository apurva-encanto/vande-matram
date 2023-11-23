<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{asset('assets/css/customs.css')}}" />
        <link href="https://fonts.googleapis.com/css?family=Outfit" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
    </head>
    <body class="">
        <div class="row container-fluid" id="main-section">
            <div class="col-lg-1 left-section">
                <img src="{{ asset('assets/images/Layer_6_copy_xA0_Image_1_.png')}}" class="ad-1" width="120%" alt="" />
            </div>
            <div class="col-lg-10 main-section">
                <div class="header">
                    <div class="left text-uppercase">Apps: <img src="{{ asset('assets/images-data/android.png')}}" alt="" /><img class="mx-1" src="{{ asset('assets/images-data/ios.png')}}" alt="" /></div>

                    <div class="center ad-1 text-uppercase">
                        Follow us on : <img src="{{ asset('assets/images-data/facebook.png')}}" alt="" />
                        <img src="{{ asset('assets/images-data/linkedin.png')}}" alt="" />
                        <img src="{{ asset('assets/images-data/twitter.png')}}" alt="" />
                        <img src="{{ asset('assets/images-data/instagram.png')}}" alt="" />
                        <img src="{{ asset('assets/images-data/google.png')}}" alt="" />
                        <img src="{{ asset('assets/images-data/youtube.png')}}" alt="" />
                    </div>
                    <div class="right text-uppercase">
                       <a class="text-white" style="margin-right:5px;" target="_blank" href="{{url('login')}}"><i class="fa fa-newspaper-o mx-1"></i> E Paper</a>

                       <a class="text-white" style="margin-right:5px;" target="_blank" href="{{url('login')}}">Login</a>
                        <select name="" id="loginUser">
                            <option value="" selected disabled>Change Language</option>
                            <option value="telugu">తెలుగు</option>
                            <option value="english">English</option>
                            <option value="hindi">हिंदी</option>
                            <option value="kanada">ಕನ್ನಡ</option>
                        </select>
                    </div>
                </div>
                <div class=" bg-white p-2">
                    <div class="row">
                        <div class="col-lg-4 col-md-10">
                         <a href="{{ url('/') }}"><img class="mx-4 logo-img" src="{{ asset('assets/images/logo-light.png')}}" alt="" /></a>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <img class="ad-header" src="{{ asset('uploads/ad/')}}{{main_header_img()}}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!--nav bar goes here-->

                @include('layouts.front.categories')
                <!--flash news goes here-->
                @include('layouts.front.flash-news')
                <!--main content-->
                @yield('main-content') @include('layouts.front.footer')
                <!--footer goes here-->
            </div>
            <div class="col-md-1 right-section">
                <img src="{{ asset('assets/images/Layer_6_copy_xA0_Image_1_.png')}}" class="ad-1" width="120%" alt="" />
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>

        <script>
            $("#loginUser").change(function () {
                // Get the selected value
                var baseUrl = "{{ url('/') }}";
                var selectedValue = $(this).val();
                var url = baseUrl+'/'+selectedValue + '-login';
                // window.location.replace(url);
            });
        </script>
        <script>
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                    items: 1
                    },
                    600: {
                    items: 1
                    },
                    1000: {
                    items: 1
                    }
                }
                })
        </script>

    </body>
</html>
