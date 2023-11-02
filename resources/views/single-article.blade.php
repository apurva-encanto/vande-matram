@extends('layouts.front.main')

@section('main-content')
<main class="has-m has-ad-m" id="main-wrapper" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
        <div class="main section" id="main" name="Main Posts">
            <div class="widget Blog" data-version="2" id="Blog1">
                <div class="blog-posts hfeed item-post-wrap">
                    <article class="blog-post hentry item-post">
                      
                        <script type="text/javascript">
                            var exportify = {
                                noTitle: "No title",
                                viewAll: "View all",
                                postAuthor: true,
                                postAuthorLabel: "by",
                                postDate: true,
                                postDateLabel: "-",
                                postLabels: true,
                            };
                        </script>
                        <div class="item-post-inner">
                            <div class="entry-header blog-entry-header has-meta">
                                <nav id="breadcrumb">
                                    <a class="home" href="{{url('/')}}">Home</a><em class="delimiter"></em><a class="label" href="{{ url('news-'.$article->category_slug) }}">{{$article->category_name}}</a>
                                </nav>
                               
                                <h1 class="entry-title">{{$article->title}}</h1>
                                <div class="entry-meta">
                                    <div class="align-left">
                                        <span class="entry-author mi">
                                            <span class="author-avatar-wrap">
                                                <span
                                                    class="author-avatar lazy-ify"
                                                    data-image="{{ asset('storage/uploads/user_'.$article->user_id.'/'.$article->photo)}}"
                                                    style="
                                                        background-image: url({{ asset('storage/uploads/user_'.$article->user_id.'/'.$article->photo)}});
                                                    "
                                                ></span>
                                            </span>
                                            <span class="by sp">by</span><span class="author-name">{{$article->user_name}}</span>
                                        </span>
                                        <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="{{$article->publish_date}}">{{ getconvertedDate($article->publish_date) }}</time></span>
                                    </div>
                                    <div class="align-right">
                                        <span class="entry-comments-link show">0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="entry-content-wrap">
                                <div id="before-ad">
                                    <div class="widget HTML" data-version="2" id="HTML4">
                                        <div class="widget-title"><h3 class="title">Facebook</h3></div>
                                        <div class="widget-content">
                                            <a class="ads-here" href="https://www.templateify.com/">Responsive Advertisement</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-body entry-content" id="post-body">
                                    <div dir="ltr" style="text-align: left;" trbidi="on">
                                        <img
                                            alt="Marketing agency, some of our content clusters are"
                                            border="0"
                                            src="{{ asset('storage/uploads/article_'.$article->user_id.'/'.$article->image)}}"
                                            title="{{$article->title}}"
                                        />
                                        <br />
                                        <div><br /></div>
                                        <div>
                                            {!! html_entity_decode($article->content) !!}
                                        </div>
                                    </div>
                                </div>
                                <div id="after-ad">
                                    <div class="widget HTML" data-version="2" id="HTML6">
                                        <div class="widget-title"><h3 class="title">Facebook</h3></div>
                                        <div class="widget-content">
                                            <a class="ads-here" href="https://www.templateify.com/">Responsive Advertisement</a>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="entry-labels">
                                    <span class="labels-label">Tags:</span>
                                    <a class="label-link" href="https://selary-templateify.blogspot.com/search/label/Health" rel="tag">Health</a>
                                    <a class="label-link" href="https://selary-templateify.blogspot.com/search/label/Laptops" rel="tag">Laptops</a>
                                    <a class="label-link" href="https://selary-templateify.blogspot.com/search/label/Technology" rel="tag">Technology</a>
                                </div> --}}
                            </div>
                            <div class="post-share">
                                <ul class="selary-pro-share-links social social-bg">
                                    <li class="facebook has-span">
                                        <a
                                            class="facebook btn window-ify"
                                            data-height="500"
                                            data-url="https://www.facebook.com/sharer.php?u=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html"
                                            data-width="520"
                                            href="javascript:;"
                                            rel="nofollow"
                                            title="Facebook"
                                        >
                                            <span>Facebook</span>
                                        </a>
                                    </li>
                                    <li class="twitter has-span">
                                        <a
                                            class="twitter btn window-ify"
                                            data-height="520"
                                            data-url="https://twitter.com/intent/tweet?url=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html&amp;text=Where a “story” is being told without words"
                                            data-width="860"
                                            href="javascript:;"
                                            rel="nofollow"
                                            title="Twitter"
                                        >
                                            <span>Twitter</span>
                                        </a>
                                    </li>
                                    <li class="whatsapp">
                                        <a
                                            class="whatsapp btn window-ify"
                                            data-height="520"
                                            data-url="https://api.whatsapp.com/send?text=Where a “story” is being told without words | https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html"
                                            data-width="860"
                                            href="javascript:;"
                                            rel="nofollow"
                                            title="WhatsApp"
                                        ></a>
                                    </li>
                                    <li class="pinterest-p">
                                        <a
                                            class="pinterest btn window-ify"
                                            data-height="520"
                                            data-url="https://www.pinterest.com/pin/create/button/?url=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html&amp;media=https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgwuTDTMAj5K8YCV-CJHkRdw6aHfFwfVLb2GGRzuzv26NqGimOiWqQyIwveIfdF5pP29Vf9l5BANUJfgKKFnJu34UjSrCqWHw69fDUrLKN9xq93mhj869DCB7pitRceiY0x_NLTMjcRBtbgvgcNqByJaaaBSuMT0vVw4ZN_-jTXObWHr2nkvQk1rbPrNH99/s1600/22.jpeg&amp;description=Where a “story” is being told without words"
                                            data-width="860"
                                            href="javascript:;"
                                            rel="nofollow"
                                            title="Pinterest"
                                        ></a>
                                    </li>
                                    <li class="reddit">
                                        <a
                                            class="reddit btn window-ify"
                                            data-height="520"
                                            data-url="https://reddit.com/submit?url=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html&amp;title=Where a “story” is being told without words"
                                            data-width="860"
                                            href="javascript:;"
                                            rel="nofollow"
                                            title="Reddit"
                                        ></a>
                                    </li>
                                    <li class="linkedin">
                                        <a
                                            class="linkedin btn window-ify"
                                            data-height="520"
                                            data-url="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html&amp;title=Where a “story” is being told without words"
                                            data-width="860"
                                            href="javascript:;"
                                            rel="nofollow"
                                            title="LinkedIn"
                                        ></a>
                                    </li>
                                    <li class="tumblr">
                                        <a
                                            class="tumblr btn window-ify"
                                            data-height="520"
                                            data-url="https://www.tumblr.com/share/link?url=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html&amp;name=Where a “story” is being told without words"
                                            data-width="860"
                                            href="javascript:;"
                                            rel="nofollow"
                                            title="Tumblr"
                                        ></a>
                                    </li>
                                    <li class="telegram">
                                        <a
                                            class="telegram btn window-ify"
                                            data-height="520"
                                            data-url="https://telegram.me/share/url?url=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html&amp;text=Where a “story” is being told without words"
                                            data-width="860"
                                            href="javascript:;"
                                            rel="nofollow"
                                            title="Telegram"
                                        ></a>
                                    </li>
                                    <li class="email">
                                        <a
                                            class="email btn window-ify"
                                            data-height="500"
                                            data-url="mailto:?subject=Where a “story” is being told without words&amp;body=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html"
                                            data-width="520"
                                            href="javascript:;"
                                            rel="nofollow"
                                            title="Email"
                                        ></a>
                                    </li>
                                    <li class="show-hid"><a class="btn" href="javascript:;" rel="nofollow" title="Show more"></a></li>
                                </ul>
                            </div>
                        </div>
                        <footer class="post-footer">
                            <div class="about-author">
                                <div class="author-avatar-wrap">
                                    <span
                                        class="author-avatar lazy-ify"
                                        data-image="//blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjDDpY9e0j9QY__PW0Pex55SbvON7MXVow21vEH9UI_qi-nSt7ZKfDdfP_gPuSHq1_JyVcPfFsmn6wq0Yh2hdSxsq6Ft2QRQdvUowy5mwC70_XTSmLo9vayd54wbFNqjA/w72-h72-p-k-no-nu/Sora+Blogging+Tips.jpg"
                                        style="
                                            background-image: url(https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjDDpY9e0j9QY__PW0Pex55SbvON7MXVow21vEH9UI_qi-nSt7ZKfDdfP_gPuSHq1_JyVcPfFsmn6wq0Yh2hdSxsq6Ft2QRQdvUowy5mwC70_XTSmLo9vayd54wbFNqjA/w66-h66-p-k-no-nu/Sora + Blogging + Tips.jpg);
                                        "
                                    ></span>
                                </div>
                                <div class="author-description">
                                    <span class="author-title"><a alt="Sora Blogging Tips" href="https://draft.blogger.com/profile/10586181580218996420" rel="noopener noreferrer" target="_blank">Sora Blogging Tips</a></span>
                                    <p class="author-text excerpt">SoraBloggingTips Is A Site Where You Find Unique And High-Quality Professional Blogger Templates For Free.</p>
                                </div>
                            </div>
                            <div id="related-wrap" class="type-related">
                                <div class="title-wrap related-title">
                                    <span class="title">You might like</span>
                                </div>
                                <div class="selary-pro-related-content">
                                    <div class="related-posts">
                                        <div class="related-item item-0">
                                            <a title="Celebrities in the Vanity Fair Coashella Studio" class="entry-image-wrap is-image" href="https://selary-templateify.blogspot.com/2023/02/celebrities-in-vanity-fair-coashella.html">
                                                <span
                                                    class="entry-thumb lazy-ify"
                                                    data-image="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhQ9HudXu-xNRnx-hIVwuiAHQB-TQOXsyOn3tJ0zUI_uExNg84xH494oUvzYEF8e64okRFday3jM2sgiHKfulUfAM3iL6Tx7BMA2TwDsgv9PGPhSB4sMAJdZQ7hNPBoG4yzsT8XlqovlYouCFDdLA6eUoBpFmbEzgvgFK5L0_fLVtQNEIaGNT6_PcPtx8jn/w72-h72-p-k-no-nu/21.jpeg"
                                                    style="
                                                        background-image: url(https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhQ9HudXu-xNRnx-hIVwuiAHQB-TQOXsyOn3tJ0zUI_uExNg84xH494oUvzYEF8e64okRFday3jM2sgiHKfulUfAM3iL6Tx7BMA2TwDsgv9PGPhSB4sMAJdZQ7hNPBoG4yzsT8XlqovlYouCFDdLA6eUoBpFmbEzgvgFK5L0_fLVtQNEIaGNT6_PcPtx8jn/w238-h154-p-k-no-nu/21.jpeg);
                                                    "
                                                ></span>
                                            </a>
                                            <div class="entry-header">
                                                <h2 class="entry-title">
                                                    <a href="https://selary-templateify.blogspot.com/2023/02/celebrities-in-vanity-fair-coashella.html" title="Celebrities in the Vanity Fair Coashella Studio">
                                                        Celebrities in the Vanity Fair Coashella Studio
                                                    </a>
                                                </h2>
                                                <div class="entry-meta">
                                                    <span class="entry-time mi"><time class="published" datetime="2023-02-25T19:19:00.000-08:00">February 25, 2023</time></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="related-item item-1">
                                            <a title="Where a “story” is being told without words" class="entry-image-wrap is-image" href="https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html">
                                                <span
                                                    class="entry-thumb lazy-ify"
                                                    data-image="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgwuTDTMAj5K8YCV-CJHkRdw6aHfFwfVLb2GGRzuzv26NqGimOiWqQyIwveIfdF5pP29Vf9l5BANUJfgKKFnJu34UjSrCqWHw69fDUrLKN9xq93mhj869DCB7pitRceiY0x_NLTMjcRBtbgvgcNqByJaaaBSuMT0vVw4ZN_-jTXObWHr2nkvQk1rbPrNH99/w72-h72-p-k-no-nu/22.jpeg"
                                                    style="
                                                        background-image: url(https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgwuTDTMAj5K8YCV-CJHkRdw6aHfFwfVLb2GGRzuzv26NqGimOiWqQyIwveIfdF5pP29Vf9l5BANUJfgKKFnJu34UjSrCqWHw69fDUrLKN9xq93mhj869DCB7pitRceiY0x_NLTMjcRBtbgvgcNqByJaaaBSuMT0vVw4ZN_-jTXObWHr2nkvQk1rbPrNH99/w238-h154-p-k-no-nu/22.jpeg);
                                                    "
                                                ></span>
                                            </a>
                                            <div class="entry-header">
                                                <h2 class="entry-title">
                                                    <a href="https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html" title="Where a “story” is being told without words">
                                                        Where a “story” is being told without words
                                                    </a>
                                                </h2>
                                                <div class="entry-meta">
                                                    <span class="entry-time mi"><time class="published" datetime="2017-03-17T00:59:00.000-07:00">March 17, 2017</time></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="post-footer-ads">
                                <div class="widget HTML" data-version="2" id="HTML9">
                                    <div class="widget-content">
                                        <a class="ads-here" href="https://www.templateify.com/">Responsive Advertisement</a>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </article>
                 
                    <div class="post-nav">
                        <a class="post-nav-newer-link" href="https://selary-templateify.blogspot.com/2023/02/celebrities-in-vanity-fair-coashella.html" id="Blog1_post-nav-newer-link">
                            Previous Post
                        </a>
                        <a class="post-nav-older-link" href="https://selary-templateify.blogspot.com/2017/03/celebrities-in-vanity-fair-coashella.html" id="Blog1_post-nav-older-link">
                            Next Post
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="custom-ads">
            <div class="section" id="selary-pro-main-before-ad" name="Post ADS 1"></div>
            <div class="section" id="selary-pro-main-after-ad" name="Post ADS 2"></div>
        </div>
        <div class="section" id="selary-pro-related-posts" name="Related Posts"><div class="widget HTML"  data-version="2" id="HTML101"></div></div>
        <div class="section" id="selary-pro-post-footer-ads" name="Post ADS 3"></div>
    </div>
</main>

@endsection