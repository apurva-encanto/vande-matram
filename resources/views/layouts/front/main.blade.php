<!DOCTYPE html>
<html class="ltr" dir="ltr" lang="en_gb" xmlns="http://www.w3.org/1999/xhtml" xmlns:b="http://www.google.com/2005/gml/b" xmlns:data="http://www.google.com/2005/gml/data" xmlns:expr="http://www.google.com/2005/gml/expr">
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
        <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=yes" name="viewport" />
        <title>Vande Matram</title>        
        <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo-light.png')}}">      
        <!-- Font Awesome Free 5.15.1 -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" rel="stylesheet" />
        <!-- Theme CSS Style -->
        <style id="page-skin-1" type="text/css">
            <!--
            @include('layouts.front.style');
        </style>
    </head>
    <body class="is-home is-multiple">
        <!-- Theme Options -->

        <!-- Outer Wrapper -->
        <div id="outer-wrapper">
          
            <!-- Header Wrapper -->
            <header id="header-wrapper">
                <nav class="topbar-wrap flex-center">
                    <div class="container row-x1">
                        <div class="topbar-items">
                            <div class="flex-left flex-content">
                                <div class="topbar-menu section" id="topbar-menu" name="Topbar Menu">
                                    <div class="widget LinkList"  id="LinkList105">
                                        <ul class="topbar-ul link-list">
                                            <li><a href="/">Home</a></li>
                                            <li><a href="/">About Us</a></li>
                                            <li><a href="/">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-center flex-content">
                                <div class="main-logo section" id="main-logo" name="Header Logo">
                                    <div class="widget Header"  id="Header1">
                                        <a class="logo-img" href="{{url('/')}}">
                                            <img
                                                alt="Selary"
                                                data-height="38"
                                                data-width="251"
                                                src="{{asset('assets/images/logo-light.png')}}"
                                                title="Selary"
                                            />
                                            <h1 id="h1-off">Vandematram News</h1>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-right flex-content">
                                <div class="topbar-social section" id="topbar-social" name="Topbar Icons">
                                    <div class="widget LinkList"  id="LinkList106">
                                        <div class="widget-content">
                                            <ul class="topbar-ul social-icons social">
                                                <li class="facebook link-0"><a alt="facebook" class="facebook" href="#" rel="noopener noreferrer" target="_blank" title="facebook"></a></li>
                                                <li class="twitter link-1"><a alt="twitter" class="twitter" href="#" rel="noopener noreferrer" target="_blank" title="twitter"></a></li>
                                                <li class="youtube link-2"><a alt="youtube" class="youtube" href="#" rel="noopener noreferrer" target="_blank" title="youtube"></a></li>
                                                <li class="rss link-3"><a alt="rss" class="rss" href="#" rel="noopener noreferrer" target="_blank" title="rss"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="main-header">
                    <div class="header-inner show">
                        <div class="header-header flex-center">
                            <div class="container row-x1">
                                <div class="header-items">
                                    <div class="flex-left">
                                        <div class="selary-mobile-logo-section main-logo section" id="selary-mobile-logo-section" name="Mobile Logo Section">
                                            <div class="widget Image"  id="Image121">
                                                <a class="mobile-menu-toggle" href="javascript:;" role="button" title="Menu"></a>
                                                <a class="logo-img custom-image" href="/">
                                                    <img
                                                        alt="VandeMatram News"
                                                        id="Image121_img"
                                                        src="{{asset('assets/images/logo-light.png')}}"
                                                    />
                                                    <h1 id="h1-off">VandeMatram News</h1>
                                                </a>
                                            </div>
                                        </div>
                                        @include('layouts.front.categories')
                                    </div>
                                    <div class="flex-right">
                                        <div class="main-toggle-wrap">
                                            <a class="main-toggle-style darkmode-toggle" href="javascript:;" role="button"></a>
                                            <a class="main-toggle-style show-search" href="javascript:;" role="button" title="Search"></a>
                                        </div>
                                    </div>
                                    <div id="main-search-wrap" style="display: none;">
                                        <div class="main-search">
                                            <form action="#" class="search-form" role="search">
                                                <input autocomplete="off" class="search-input" name="q" placeholder="Search" type="search" value="" />
                                            </form>
                                            <a class="main-toggle-style hide-search" href="javascript:;" role="button" title="Search"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </header>
            <div class="flex-center" id="header-ads-wrap">
                <div class="header-ads container row-x1 section" id="header-ads" name="Header ADS">
                    <div class="widget HTML"  id="HTML1">
                        <div class="widget-content">
                            <a class="ads-here" href="#">Responsive Advertisement</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Posts -->
            @yield('featured-posts')
          
            <!-- Content Wrapper -->
            <div class="flex-center" id="content-wrapper">
                <div class="container row-x1">
                    <!-- Main Wrapper -->
                     @yield('main-content')
                    <!-- Sidebar Wrapper -->
                    <aside id="sidebar-wrapper">
                        <div class="sidebar selary-pro-widget-ready section" id="sidebar" name="Sidebar">
                            <div class="widget PopularPosts"  id="PopularPosts2">
                                <div class="widget-title title-wrap"><h3 class="title">Popular News</h3></div>
                                @yield('popular-posts')
                            </div>
                            <div class="widget HTML"  id="HTML8">
                                <div class="widget-title title-wrap"><h3 class="title">Latest News</h3></div>
                                <div class="widget-content">
                                    @yield('latest-news')
                                </div>
                            </div>
                            <div class="widget HTML"  id="HTML19">
                                <div />
                            </div>
                        </div>
                        <div class="widget Label"  id="Label2">
                            <div class="widget-title title-wrap"><h3 class="title">Main Tags</h3></div>
                            <div class="widget-content cloud-label">
                                <ul class="cloud-style">
                                    @foreach ($tags as $tag)
                                    <li>
                                        <a class="label-name btn has-count" href="{{ url('news-'.$tag->slug) }}">{{$tag->category_name}} <span class="label-count count-style">({{$tag->number_of_articles}})</span></a>
                                    </li>   
                                    @endforeach                                  
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                    </aside>
                </div>
            </div>
            <!-- Footer Ads -->
            <div class="flex-center" id="footer-ads-wrap">
                <div class="footer-ads container row-x1 section" id="footer-ads" name="Footer ADS">
                    <div class="widget HTML"  id="HTML3">
                        <div class="widget-content">
                            <a class="ads-here" href="">Responsive Advertisement</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Wrapper -->
            <footer id="footer-wrapper">
                <div class="primary-footer flex-center">
                    <div class="container row-x1">
                        <div class="selary-pro-about-section section" id="selary-pro-about-section" name="About Section">
                            <div class="widget Image"  id="Image101">
                                <a class="footer-logo custom-image" href="/">
                                    <img
                                        alt="Selary"
                                        id="Image101_img"
                                        src="{{asset('assets/images/logo-light.png')}}"
                                    />
                                </a>
                                <div class="footer-info">
                                    <h3 class="title">About Us</h3>
                                    <p class="image-caption excerpt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                </div>
                            </div>
                            <div class="widget LinkList"  id="LinkList103">
                                <ul class="social-icons social social-bg-hover">
                                    <li class="facebook link-0"><a alt="facebook" class="facebook btn" href="https://www.facebook.com/" rel="noopener noreferrer" target="_blank" title="facebook"></a></li>
                                    <li class="twitter link-1"><a alt="twitter" class="twitter btn" href="https://twitter.com/" rel="noopener noreferrer" target="_blank" title="twitter"></a></li>
                                    <li class="youtube link-2"><a alt="youtube" class="youtube btn" href="https://www.youtube.com/" rel="noopener noreferrer" target="_blank" title="youtube"></a></li>
                                    <li class="instagram link-3"><a alt="instagram" class="instagram btn" href="https://www.instagram.com//" rel="noopener noreferrer" target="_blank" title="instagram"></a></li>
                                    <li class="rss link-4"><a alt="rss" class="rss btn" href="#" rel="noopener noreferrer" target="_blank" title="rss"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footerbar flex-center">
                    <div class="container row-x1">
                        <div class="footer-copyright" id="footer-copyright">
                            <span class="copyright-text"><p>Copyright (c) 2023 <a href='{{url('/>')}}'>VandeMatram News</a> All Right Reseved</p>

                            <div style='font-size:1px; opacity:0;'>

                                <span class="copyright-text"><a href="{{url('/')}}" id="mycontent" title="VandeMatram News">VandeMatram News</a></span>



                            </div></span>
                        </div>
                        <div class="footer-menu section" id="footer-menu" name="Footer Menu">
                            <div class="widget LinkList"  id="LinkList104">
                                <ul class="link-list list-style">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('about-us')}}">About Us</a></li>
                                    <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Cookie Consent -->
            <div id="selary-pro-cookie-ify">
                <div class="section" id="selary-pro-cookie-ify-section" name="Cookie Consent">
                    <div class="widget Text"  id="Text1">
                        <p class="selary-pro-cookie-ify-content excerpt">Our website uses cookies to improve your experience. <a href="#">Learn more</a></p>
                        <a class="btn" href="javascript:;" id="selary-pro-cookie-ify-accept" role="button" title="Ok">Ok</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu and Back Top -->
        <div id="slide-menu">
            <div class="slide-menu-header">
                <div class="mobile-search">
                    <form action="" class="search-form" role="search">
                        <input autocomplete="off" class="search-input" name="q" placeholder="Search" type="search" value="" />
                        <button class="search-action" type="submit" value=""></button>
                    </form>
                </div>
                <a class="hide-selary-pro-mobile-menu" href="javascript:;" role="button"></a>
            </div>
            <div class="slide-menu-flex">
                <div class="selary-pro-mobile-menu" id="selary-pro-mobile-menu"></div>
                <div class="hidden-widgets-side section" id="hidden-widgets-side">
                    <div class="widget PopularPosts"  id="PopularPosts1">
                        <div class="widget-title"><h3 class="title">Popular News</h3></div>
                        <div class="widget-content default-items">
                            @foreach ($popular_posts as  $key=>$post)
                            @if($key==0)
                            <div class="default-item card-style item-0">
                                <a class="entry-image-wrap before-mask is-image" href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" title="{{$post->title}}">
                                    <span
                                        class="entry-thumb"
                                        data-image="{{ asset('storage/uploads/article_'.$post->user_id.'/'.$post->image)}}"
                                    ></span>
                                </a>
                                <div class="entry-header entry-info">
                                    <span class="entry-category">{{$post->category_name}}</span>
                                    <p class="entry-title" style="font-size: 12px;">
                                        <a   href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" title="{{$post->title}}">
                                            {{$post->title}}
                                        </a>
                                    </p>
                                    <div class="entry-meta">
                                        <span class="entry-author mi"><span class="sp">by</span><span class="author-name"> {{$post->user_name}}</span></span>
                                        <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="{{$post->publish_date}}">{{ getconvertedDate($post->publish_date) }}</time></span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($key>0)
                            <div class="default-item item-{{$key}}">
                                <a class="entry-image-wrap is-image" href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" title="{{$post->title}}" title="{{$post->title}}">
                                    <span
                                        class="entry-thumb"
                                        data-image="{{ asset('storage/uploads/article_'.$post->user_id.'/'.$post->image)}}"
                                    ></span>
                                </a>
                                <div class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" title="{{$post->title}}" title="{{$post->title}}">
                                            {{getShortContent($post->title)}}
                                        </a>
                                    </h2>
                                    <div class="entry-meta">
                                        <span class="entry-time mi"><time class="published" datetime="{{$post->publish_date}}">{{ getconvertedDate($post->publish_date) }}</time></span>
                                    </div>
                                </div>
                            </div>

                            @endif
                                
                            @endforeach
                          
                           
                        </div>
                    </div>
                </div>
                <div class="mm-footer">
                    <div class="mm-social"></div>
                    <div class="mm-menu"></div>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
        <a class="btn" href="javascript:;" id="back-top" role="button" title="Back To Top"></a>
        <!-- Hosted Plugins -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
        <!-- Local Plugins -->
       <!-- Local Plugins -->

    <!-- Theme Scripts -->
 
    <!-- Blogger Scripts -->

       <script src="{{asset('assets/js/custom.js')}}"></script>   
       <script src="{{asset('assets/js/theme.js')}}"></script>   
        <script type="text/javascript" src="https://www.blogger.com/static/v1/widgets/4222370799-widgets.js"></script>
    </body>
</html>
