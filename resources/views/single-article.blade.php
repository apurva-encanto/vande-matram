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
                                                <span class="author-avatar lazy-ify" data-image="{{ asset('storage/uploads/user_'.$article->user_id.'/'.$article->photo)}}" style="
                                                        background-image: url({{ asset('storage/uploads/user_'.$article->user_id.'/'.$article->photo)}});
                                                    "></span>
                                            </span>
                                            <span class="by sp">by</span><span class="author-name">{{$article->user_name}}</span>
                                        </span>
                                        <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="{{$article->publish_date}}">{{ getconvertedDate($article->publish_date) }}</time></span>
                                    </div>
                                    <div class="align-right p-2">
                                        <span class="fa fa-eye show view-icon">{{$article->views}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="entry-content-wrap">
                                <div id="before-ad">
                                    <div class="widget HTML" data-version="2" id="HTML4">
                                        <div class="widget-title">
                                            <h3 class="title">Facebook</h3>
                                        </div>
                                        <div class="widget-content">
                                            <a class="ads-here" href="https://www.templateify.com/">Responsive Advertisement</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-body entry-content" id="post-body">
                                    <div dir="ltr" style="text-align: left;" trbidi="on">
                                        <img alt="Marketing agency, some of our content clusters are" border="0" src="{{ asset('storage/uploads/article_'.$article->user_id.'/'.$article->image)}}" title="{{$article->title}}" />
                                        <br />
                                        <div><br /></div>
                                        <div>
                                            {!! html_entity_decode($article->content) !!}
                                        </div>
                                    </div>
                                </div>
                                <div id="after-ad">
                                    <div class="widget HTML" data-version="2" id="HTML6">
                                        <div class="widget-title">
                                            <h3 class="title">Facebook</h3>
                                        </div>
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
                                        <a class="facebook btn window-ify" data-height="500" data-url="https://www.facebook.com/sharer.php?u=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html" data-width="520" href="javascript:;" rel="nofollow" title="Facebook">
                                            <span>Facebook</span>
                                        </a>
                                    </li>
                                    <li class="twitter has-span">
                                        <a class="twitter btn window-ify" data-height="520" data-url="https://twitter.com/intent/tweet?url=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html&amp;text=Where a “story” is being told without words" data-width="860" href="javascript:;" rel="nofollow" title="Twitter">
                                            <span>Twitter</span>
                                        </a>
                                    </li>
                                    <li class="whatsapp">
                                        <a class="whatsapp btn window-ify" data-height="520" data-url="https://api.whatsapp.com/send?text=Where a “story” is being told without words | https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html" data-width="860" href="javascript:;" rel="nofollow" title="WhatsApp"></a>
                                    </li>
                                    <li class="pinterest-p">
                                        <a class="pinterest btn window-ify" data-height="520" data-url="https://www.pinterest.com/pin/create/button/?url=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html&amp;media=https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgwuTDTMAj5K8YCV-CJHkRdw6aHfFwfVLb2GGRzuzv26NqGimOiWqQyIwveIfdF5pP29Vf9l5BANUJfgKKFnJu34UjSrCqWHw69fDUrLKN9xq93mhj869DCB7pitRceiY0x_NLTMjcRBtbgvgcNqByJaaaBSuMT0vVw4ZN_-jTXObWHr2nkvQk1rbPrNH99/s1600/22.jpeg&amp;description=Where a “story” is being told without words" data-width="860" href="javascript:;" rel="nofollow" title="Pinterest"></a>
                                    </li>
                                    <li class="reddit">
                                        <a class="reddit btn window-ify" data-height="520" data-url="https://reddit.com/submit?url=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html&amp;title=Where a “story” is being told without words" data-width="860" href="javascript:;" rel="nofollow" title="Reddit"></a>
                                    </li>
                                    <li class="linkedin">
                                        <a class="linkedin btn window-ify" data-height="520" data-url="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html&amp;title=Where a “story” is being told without words" data-width="860" href="javascript:;" rel="nofollow" title="LinkedIn"></a>
                                    </li>
                                    <li class="tumblr">
                                        <a class="tumblr btn window-ify" data-height="520" data-url="https://www.tumblr.com/share/link?url=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html&amp;name=Where a “story” is being told without words" data-width="860" href="javascript:;" rel="nofollow" title="Tumblr"></a>
                                    </li>
                                    <li class="telegram">
                                        <a class="telegram btn window-ify" data-height="520" data-url="https://telegram.me/share/url?url=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html&amp;text=Where a “story” is being told without words" data-width="860" href="javascript:;" rel="nofollow" title="Telegram"></a>
                                    </li>
                                    <li class="email">
                                        <a class="email btn window-ify" data-height="500" data-url="mailto:?subject=Where a “story” is being told without words&amp;body=https://selary-templateify.blogspot.com/2017/03/where-story-is-being-told-without-words.html" data-width="520" href="javascript:;" rel="nofollow" title="Email"></a>
                                    </li>
                                    <li class="show-hid"><a class="btn" href="javascript:;" rel="nofollow" title="Show more"></a></li>
                                </ul>
                            </div>
                        </div>
                        <footer class="post-footer">
                            <div class="about-author">
                                <div class="author-avatar-wrap">
                                    <span class="author-avatar lazy-ify" data-image="{{ asset('storage/uploads/user_'.$article->user_id.'/'.$article->photo)}}" style="
                                            background-image: url({{ asset('storage/uploads/user_'.$article->user_id.'/'.$article->photo)}});
                                        "></span>
                                </div>
                                <div class="author-description">
                                    <span class="author-title"><a alt="{{$article->user_name}}" href="" rel="noopener noreferrer" target="_blank">{{$article->user_name}}</a></span>
                                    <p class="author-text excerpt">Verified Editor</p>
                                </div>
                            </div>
                            <div id="related-wrap" class="type-related">
                                <div class="title-wrap related-title">
                                    <span class="title">You might like</span>
                                </div>
                                <div class="selary-pro-related-content">
                                    <div class="related-posts">
                                        @foreach($similar_posts as $key=>$post)
                                        <div class="related-item item-{{$key}}">
                                            <a title="{{$post->title}}" class="entry-image-wrap is-image" href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}">
                                                <span class="entry-thumb lazy-ify" data-image="{{ asset('storage/uploads/article_'.$post->user_id.'/'.$post->image)}}" style="
                                                        background-image: url({{ asset('storage/uploads/article_'.$post->user_id.'/'.$post->image)}});
                                                    "></span>
                                            </a>
                                            <div class="entry-header">
                                                <h2 class="entry-title">
                                                    <a href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" title="{{$post->title}}">
                                                        {{$post->title}}
                                                    </a>
                                                </h2>
                                                <div class="entry-meta">
                                                    <span class="entry-time mi"><time class="published" datetime="{{$post->publish_date}}">{{ getconvertedDate($post->publish_date) }}</time></span>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div id="post-footer-ads">
                                <div class="widget HTML" data-version="2" id="HTML9">
                                    <div class="widget-content">
                                        <a class="ads-here" href="">Responsive Advertisement</a>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </article>

                    <div class="post-nav">
                        <a class="post-nav-newer-link btn" onclick="history.back(1);" id="Blog1_post-nav-newer-link">
                            Previous Post
                        </a>
                        <a class="post-nav-older-link btn" href="" id="Blog1_post-nav-older-link">
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
        <div class="section" id="selary-pro-related-posts" name="Related Posts">
            <div class="widget HTML" data-version="2" id="HTML101"></div>
        </div>
        <div class="section" id="selary-pro-post-footer-ads" name="Post ADS 3"></div>
    </div>
</main>

@endsection




@section('popular-posts')
<div class="widget-content default-items">
    @foreach ($popular_posts as $key=>$post)
    @if($key==0)
    <div class="default-item card-style item-0">
        <a class="entry-image-wrap before-mask is-image" href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" title="{{$post->title}}">
            <span class="entry-thumb" data-image="{{ asset('storage/uploads/article_'.$post->user_id.'/'.$post->image)}}"></span>
        </a>
        <div class="entry-header entry-info">
            <span class="entry-category">{{$post->category_name}}</span>
            <h2 class="entry-title" style="font-size: 14px;">
                <a href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" title="{{$post->title}}">
                    {{$post->title}}
                </a>
            </h2>
            <div class="entry-meta">
                <span class="entry-author mi"><span class="sp">by</span><span class="author-name">{{$post->user_name}}</span></span>
                <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="{{$post->publish_date}}">{{ getconvertedDate($post->publish_date) }}</time></span>
            </div>
        </div>
    </div>
    @endif
    @if($key > 0)
    <div class="default-item item-$key">
        <a class="entry-image-wrap is-image" href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" title="{{$post->title}}">
            <span class="entry-thumb" data-image="{{ asset('storage/uploads/article_'.$post->user_id.'/'.$post->image)}}"></span>
        </a>
        <div class="entry-header">
            <h2 class="entry-title">
                <a href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" title="{{$post->title}}">
                    {{$post->title}}
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
@endsection



@section('latest-news')
<div class="mini-items">

    @foreach ($latest_posts as $key=>$post)
    <div class="mini-item item-{{$key}}">
        <a title="{{$post->title}}" class="entry-image-wrap is-image" href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}">
            <span class="entry-thumb lazy-ify" data-image="{{ asset('storage/uploads/article_'.$post->user_id.'/'.$post->image)}}" style="
                    background-image: url({{ asset('storage/uploads/article_'.$post->user_id.'/'.$post->image)}});
                "></span>
        </a>
        <div class="entry-header">
            <h2 class="entry-title">
                <a href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" title="{{$post->title}}">
                    {{$post->title}}
                </a>
            </h2>
            <div class="entry-meta">
                <span class="entry-time mi"><time class="published" datetime="{{$post->publish_date}}">{{ getconvertedDate($post->publish_date) }}</time></span>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
