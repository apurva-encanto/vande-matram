@extends('layouts.front.main')

@section('featured-posts')
<div class="flex-center" id="featured-wrap">
    <div class="featured container row-x1 section" id="featured" name="Featured Posts">
        <div class="widget HTML is-visible type-featured"  id="HTML2">
            <div class="widget-content">
                <div class="featured-items featured-cards">
                    @foreach ($top_news as $key=>$news )

                    @if ($key==0)
                    <div class="featured-item card-style item-0">
                        <a title="{{$news->category_name}}" class="entry-image-wrap before-mask is-image" href="{{url('news-'.$news->category_slug.'/'.$news->title_slug)}}">
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="{{ asset('storage/uploads/article_'.$news->user_id.'/'.$news->image)}}"
                                style="
                                    background-image: url({{ asset('storage/uploads/article_'.$news->user_id.'/'.$news->image)}} );
                                "
                            ></span>
                        </a>
                        <div class="entry-header entry-info">
                            <span class="entry-category">{{$news->category_name}}</span>
                            <h2 class="entry-title">
                                <a class="content-title" title="{{$news->category_name}}" href="{{url('news-'.$news->category_slug.'/'.$news->title_slug)}}">
                                    {{$news->title}}
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="entry-author mi"><span class="sp">by</span><span class="author-name">{{$news->user_name}}</span></span>
                                <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="{{$news->publish_date}}">{{ getconvertedDate($news->publish_date) }}</time></span>
                            </div>
                            <span class="entry-excerpt excerpt">{!! getShortContent(html_entity_decode($news->content)) !!}...</span>
                        </div>
                    </div>
                    @endif
                    @if ($key==1)
                    <div class="featured-item card-style item-1">
                        <a title="Where a “story” is being told without words" class="entry-image-wrap before-mask is-image" href="{{url('news-'.$news->category_slug.'/'.$news->title_slug)}}">
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="{{ asset('storage/uploads/article_'.$news->user_id.'/'.$news->image)}}"
                                style="
                                    background-image: url({{ asset('storage/uploads/article_'.$news->user_id.'/'.$news->image)}});
                                "
                            ></span>
                        </a>
                        <div class="entry-header entry-info">
                            <span class="entry-category">{{$news->category_name}}</span>
                            <h2 class="entry-title">
                                <a class="content-title" title="Where a “story” is being told without words" href="{{url('news-'.$news->category_slug.'/'.$news->title_slug)}}">
                                    {{$news->title}}
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="entry-author mi"><span class="sp">by</span><span class="author-name">{{$news->user_name}}</span></span>
                                <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="{{$news->publish_date}}">{{ getconvertedDate($news->publish_date) }}</time></span>
                            </div>                            
                        </div>
                    </div>
                    @endif
                    @if ($key==2)
                    <div class="featured-item card-style item-2">
                        <a title="{{$news->title}}" class="entry-image-wrap before-mask is-image" href="{{url('news-'.$news->category_slug.'/'.$news->title_slug)}}">
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="{{ asset('storage/uploads/article_'.$news->user_id.'/'.$news->image)}}"
                                style="
                                    background-image: url({{ asset('storage/uploads/article_'.$news->user_id.'/'.$news->image)}});
                                "
                            ></span>
                        </a>
                        <div class="entry-header entry-info">
                            <span class="entry-category">{{$news->category_name}}</span>
                            <h2 class="entry-title">
                                <a class="content-title" title="Celebrities in the Vanity Fair Coashella Studio" href="{{url('news-'.$news->category_slug.'/'.$news->title_slug)}}">
                                    {{$news->title}}
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="entry-author mi"><span class="sp">by</span><span class="author-name">{{$news->user_name}}</span></span>
                                <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="2017-03-17T00:52:00.000-07:00">{{ getconvertedDate($news->publish_date) }}</time></span>
                            </div>
                        </div>
                    </div>
                    @endif
                          
                    @endforeach
                    
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Header Ads -->
  <div class="flex-center" id="header-ads-wrap">
    <div class="header-ads container row-x1 section" id="header-ads" name="Header ADS">
        <div class="widget HTML"  id="HTML1">
            <div class="widget-content">
                <a class="ads-here" href="https://www.templateify.com/">Responsive Advertisement</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('main-content')
<main class="has-m has-ad-m" id="main-wrapper">
    <div class="content-section section" id="content-section-1" name="Content Section 1">
        @if(array_key_exists('technology', $articles)) 
        <div class="widget HTML is-visible"  id="HTML18">
            <div class="widget-title title-wrap"><h3 class="title">Technology</h3>
            
                <a class="wt-l" href="{{ url('news-technology') }}">View all</a></div>
            <div class="widget-content">
                <div class="content-block block1-items">

                    
                   
                    <div class="block1-left">
                     @if($articles['technology'][0])
                        <div class="block1-item card-style item-0">
                            <a
                                title="{{$articles['technology'][0]->title}}"
                                class="entry-image-wrap before-mask is-image"
                                href="{{url('news-'.$articles['technology'][0]->category_slug.'/'.$articles['technology'][0]->title_slug)}}"
                            >
                                <span
                                    class="entry-thumb lazy-ify"
                                    data-image="{{ asset('storage/uploads/article_'.$articles['technology'][0]->user_id.'/'.$articles['technology'][0]->image)}}"
                                    style="
                                        background-image: url({{ asset('storage/uploads/article_'.$articles['technology'][0]->user_id.'/'.$articles['technology'][0]->image)}});
                                    "
                                ></span>
                            </a>
                            <div class="entry-header entry-info">
                                <span class="entry-category">{{$articles['technology'][0]->category_name}}</span>
                                <h2 class="entry-title">
                                    <a href="{{url('news-'.$articles['technology'][0]->category_slug.'/'.$articles['technology'][0]->title_slug)}}" title="{{$articles['technology'][0]->title}}">
                                        {{$articles['technology'][0]->title}}
                                    </a>
                                </h2>
                                <div class="entry-meta">
                                    <span class="entry-author mi"><span class="sp">by</span><span class="author-name">{{$articles['technology'][0]->user_name}}</span></span>
                                    <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="{{$articles['technology'][0]->publish_date}}">{{ getconvertedDate($articles['technology'][0]->publish_date) }}</time></span>
                                </div>
                                <span class="entry-excerpt excerpt">
                                    {!! getShortContent(html_entity_decode($articles['technology'][0]->content)) !!}...
                                </span>
                            </div>
                        </div>
                    @endif

                    </div>
                    <div class="block1-right">
                        @foreach(array_slice($articles['technology'], 1) as $key=>$technology)

                        <div class="block1-item item-{{$key}}">
                            <a title="{{$technology->title}}" class="entry-image-wrap is-image" href="{{url('news-'.$technology->category_slug.'/'.$technology->title_slug)}}">
                                <span
                                    class="entry-thumb lazy-ify"
                                    data-image="{{ asset('storage/uploads/article_'.$technology->user_id.'/'.$technology->image)}}"
                                    style="
                                        background-image: url({{ asset('storage/uploads/article_'.$technology->user_id.'/'.$technology->image)}});
                                    "
                                ></span>
                            </a>
                            <div class="entry-header">
                                <h2 class="entry-title">
                                    <a href="{{url('news-'.$technology->category_slug.'/'.$technology->title_slug)}}" title="{{$technology->title}}">
                                        {{$technology->title}}
                                    </a>
                                </h2>
                                <div class="entry-meta">
                                    <span class="entry-time mi"><time class="published" datetime="{{$technology->title}}">{{ getconvertedDate($technology->publish_date) }}</time></span>
                                </div>
                            </div>
                        </div>
                       @endforeach
                        
                    </div>               

                </div>
            </div>
        </div>
        @endif
        <div class="widget HTML is-visible"  id="HTML16">
            <div class="widget-title title-wrap"><h3 class="title">Videos</h3></div>
            <div class="widget-content">
                <div class="content-block video-items">
                    <div class="video-item card-style item-0">
                        <a
                            title="Celebrities in the Vanity Fair Coashella Studio"
                            class="entry-image-wrap before-mask is-video"
                            href="https://selary-templateify.blogspot.com/2016/03/celebrities-in-vanity-fair-coashella.html"
                        >
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh4aHP_7dO11ll28G4n89ncdJS3lKqObQ_eyLhDC5MVyMxeFOCfZ3Iohy1y5dZ-oZvJNOXoiSkgtwk-IDGMHbzRMfCCcJrLqftieCxr8WFsBxKv78_2MoRH4bPKPe6cUUxzYY9QAjbfEsESA9yMQOKo8y6apLyUG2t8WUeALVhrcMoTErvxA0VevWrBGQSi/w72-h72-p-k-no-nu/28.jpeg"
                                style="
                                    background-image: url(https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh4aHP_7dO11ll28G4n89ncdJS3lKqObQ_eyLhDC5MVyMxeFOCfZ3Iohy1y5dZ-oZvJNOXoiSkgtwk-IDGMHbzRMfCCcJrLqftieCxr8WFsBxKv78_2MoRH4bPKPe6cUUxzYY9QAjbfEsESA9yMQOKo8y6apLyUG2t8WUeALVhrcMoTErvxA0VevWrBGQSi/w251-h198-p-k-no-nu/28.jpeg);
                                "
                            ></span>
                        </a>
                        <div class="entry-header entry-info">
                            <span class="entry-category">Fashion</span>
                            <h2 class="entry-title">
                                <a title="Celebrities in the Vanity Fair Coashella Studio" href="https://selary-templateify.blogspot.com/2016/03/celebrities-in-vanity-fair-coashella.html">
                                    Celebrities in the Vanity Fair Coashella Studio
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="entry-author mi"><span class="sp">by</span><span class="author-name">Sora Blogging Tips</span></span>
                                <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="2016-03-17T00:46:00.000-07:00">March 17, 2016</time></span>
                            </div>
                        </div>
                    </div>
                    <div class="video-item card-style item-1">
                        <a
                            title="Where a “story” is being told without words"
                            class="entry-image-wrap before-mask is-video"
                            href="https://selary-templateify.blogspot.com/2016/03/where-story-is-being-told-without-words.html"
                        >
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjfKFPLxb7LyEe7RjfeEnWboz0-0W00N1l8eGnz8hpUg0xUivQnHQBpLCvI1mxEGFjqhJcfbK3SQbcKWYutMPCNjaZ6ZKvi2oSA7doSjIouZzXeRA8OvrjFbR7iCiFq3mPESmkyP387jb0zwFP8UyvzKXkpPzbXO_FBuoX4JUD0wyuGJYyNWisyQ-AfBy3Z/w72-h72-p-k-no-nu/29.jpeg"
                                style="
                                    background-image: url(https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjfKFPLxb7LyEe7RjfeEnWboz0-0W00N1l8eGnz8hpUg0xUivQnHQBpLCvI1mxEGFjqhJcfbK3SQbcKWYutMPCNjaZ6ZKvi2oSA7doSjIouZzXeRA8OvrjFbR7iCiFq3mPESmkyP387jb0zwFP8UyvzKXkpPzbXO_FBuoX4JUD0wyuGJYyNWisyQ-AfBy3Z/w251-h198-p-k-no-nu/29.jpeg);
                                "
                            ></span>
                        </a>
                        <div class="entry-header entry-info">
                            <span class="entry-category">Fashion</span>
                            <h2 class="entry-title">
                                <a title="Where a “story” is being told without words" href="https://selary-templateify.blogspot.com/2016/03/where-story-is-being-told-without-words.html">
                                    Where a “story” is being told without words
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="entry-time mi"><time class="published" datetime="2016-03-17T00:42:00.000-07:00">March 17, 2016</time></span>
                            </div>
                        </div>
                    </div>
                    <div class="video-item card-style item-2">
                        <a
                            title="Imaginary Problems Are the Root of Bad Design"
                            class="entry-image-wrap before-mask is-video"
                            href="https://selary-templateify.blogspot.com/2016/03/imaginary-problems-are-root-of-bad.html"
                        >
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhp1FWU7F5GGUV6dbQ-O5q0--5Nk5jy0kY1TbMRpAfSTH4aE8qFxLyfuB1GZt86FXOuVMwCT51dNEKfClGqfIbqwAUXJR9t90rphetgdTPrjAil1aYmmbKNpWiv9FmmFr2EsnY9msRvJAuOkWmg6wOc3d3dU_kOLuHpQyPnWXkEWMGS7A5UFW9c8Q_rKQ/w72-h72-p-k-no-nu/20.jpg"
                                style="
                                    background-image: url(https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhp1FWU7F5GGUV6dbQ-O5q0--5Nk5jy0kY1TbMRpAfSTH4aE8qFxLyfuB1GZt86FXOuVMwCT51dNEKfClGqfIbqwAUXJR9t90rphetgdTPrjAil1aYmmbKNpWiv9FmmFr2EsnY9msRvJAuOkWmg6wOc3d3dU_kOLuHpQyPnWXkEWMGS7A5UFW9c8Q_rKQ/w251-h198-p-k-no-nu/20.jpg);
                                "
                            ></span>
                        </a>
                        <div class="entry-header entry-info">
                            <span class="entry-category">Fashion</span>
                            <h2 class="entry-title">
                                <a title="Imaginary Problems Are the Root of Bad Design" href="https://selary-templateify.blogspot.com/2016/03/imaginary-problems-are-root-of-bad.html">
                                    Imaginary Problems Are the Root of Bad Design
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="entry-time mi"><time class="published" datetime="2016-03-17T00:39:00.000-07:00">March 17, 2016</time></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(array_key_exists('latest', $articles)) 

        <div class="widget HTML is-visible"  id="HTML12">
            <div class="widget-title title-wrap"><h3 class="title">Latest</h3>
            
                <a class="wt-l" href="{{ url('news-latest') }}">View all</a></div>
            <div class="widget-content">
                <div class="content-block col-items colLeft-items">

                    @foreach($articles['latest'] as $key=>$latest)
                    @if($key==0)
                    <div class="col-item card-style item-0">
                        <a
                            title="{{$latest->title}}"
                            class="entry-image-wrap before-mask is-image"
                            href="{{url('news-'.$latest->category_slug.'/'.$latest->title_slug)}}l"
                        >
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="{{ asset('storage/uploads/article_'.$latest->user_id.'/'.$latest->image)}}"
                                style="
                                    background-image: url({{ asset('storage/uploads/article_'.$latest->user_id.'/'.$latest->image)}});
                                "
                            ></span>
                        </a>
                        <div class="entry-header entry-info">
                            <span class="entry-category">{{$latest->category_name}}</span>
                            <h2 class="entry-title">
                                <a href="{{url('news-'.$latest->category_slug.'/'.$latest->title_slug)}}l" title="{{$latest->title}}">
                                    {{$latest->title}}
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="entry-author mi"><span class="sp">by</span><span class="author-name"> {{$latest->user_name}}</span></span>
                                <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="{{$latest->publish_date}}">{{ getconvertedDate($latest->publish_date) }}</time></span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($key>0)
                    <div class="col-item item-{{$key}}">
                        <a title="{{$latest->title}}" class="entry-image-wrap is-image" href="{{url('news-'.$latest->category_slug.'/'.$latest->title_slug)}}l" title="{{$latest->title}}">
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="{{ asset('storage/uploads/article_'.$latest->user_id.'/'.$latest->image)}}"
                                style="
                                    background-image: url({{ asset('storage/uploads/article_'.$latest->user_id.'/'.$latest->image)}});
                                "
                            ></span>
                        </a>
                        <div class="entry-header">
                            <h2 class="entry-title">
                                <a href="{{url('news-'.$latest->category_slug.'/'.$latest->title_slug)}}l" title="{{$latest->title}}" title="{{$latest->title}}">
                                    {{$latest->title}}
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="entry-time mi"><time class="published" datetime="{{$latest->publish_date}}">{{ getconvertedDate($latest->publish_date) }}</time></span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach               
                </div>
            </div>
        </div>
        @endif

        @if(array_key_exists('business', $articles)) 

        <div class="widget HTML is-visible"  id="HTML12">
            <div class="widget-title title-wrap"><h3 class="title">Business</h3>
                <a class="wt-l" href="{{ url('news-technology') }}">View all</a></div>
            <div class="widget-content">
                <div class="content-block col-items colLeft-items">

                    @foreach($articles['business'] as $key=>$business)
                    @if($key==0)
                    <div class="col-item card-style item-0">
                        <a
                            title="{{$business->title}}"
                            class="entry-image-wrap before-mask is-image"
                            href="{{url('news-'.$business->category_slug.'/'.$business->title_slug)}}l"
                        >
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="{{ asset('storage/uploads/article_'.$business->user_id.'/'.$business->image)}}"
                                style="
                                    background-image: url({{ asset('storage/uploads/article_'.$business->user_id.'/'.$business->image)}});
                                "
                            ></span>
                        </a>
                        <div class="entry-header entry-info">
                            <span class="entry-category">{{$business->category_name}}</span>
                            <h2 class="entry-title">
                                <a href="{{url('news-'.$business->category_slug.'/'.$business->title_slug)}}l" title="{{$business->title}}">
                                    {{$business->title}}
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="entry-author mi"><span class="sp">by</span><span class="author-name"> {{$business->user_name}}</span></span>
                                <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="{{$business->publish_date}}">{{ getconvertedDate($business->publish_date) }}</time></span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($key>0)
                    <div class="col-item item-{{$key}}">
                        <a title="{{$business->title}}" class="entry-image-wrap is-image" href="{{url('news-'.$business->category_slug.'/'.$business->title_slug)}}l" title="{{$business->title}}">
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="{{ asset('storage/uploads/article_'.$business->user_id.'/'.$business->image)}}"
                                style="
                                    background-image: url({{ asset('storage/uploads/article_'.$business->user_id.'/'.$business->image)}});
                                "
                            ></span>
                        </a>
                        <div class="entry-header">
                            <h2 class="entry-title">
                                <a href="{{url('news-'.$business->category_slug.'/'.$business->title_slug)}}l" title="{{$business->title}}" title="{{$business->title}}">
                                    {{$business->title}}
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="entry-time mi"><time class="published" datetime="{{$business->publish_date}}">{{ getconvertedDate($business->publish_date) }}</time></span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    {{-- <div class="col-item item-2">
                        <a title="Celebrities in the Vanity Fair Coashella Studio" class="entry-image-wrap is-image" href="https://selary-templateify.blogspot.com/2016/03/celebrities-in-vanity-fair-coashella.html">
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh4aHP_7dO11ll28G4n89ncdJS3lKqObQ_eyLhDC5MVyMxeFOCfZ3Iohy1y5dZ-oZvJNOXoiSkgtwk-IDGMHbzRMfCCcJrLqftieCxr8WFsBxKv78_2MoRH4bPKPe6cUUxzYY9QAjbfEsESA9yMQOKo8y6apLyUG2t8WUeALVhrcMoTErvxA0VevWrBGQSi/w72-h72-p-k-no-nu/28.jpeg"
                                style="
                                    background-image: url(https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh4aHP_7dO11ll28G4n89ncdJS3lKqObQ_eyLhDC5MVyMxeFOCfZ3Iohy1y5dZ-oZvJNOXoiSkgtwk-IDGMHbzRMfCCcJrLqftieCxr8WFsBxKv78_2MoRH4bPKPe6cUUxzYY9QAjbfEsESA9yMQOKo8y6apLyUG2t8WUeALVhrcMoTErvxA0VevWrBGQSi/w110-h72-p-k-no-nu/28.jpeg);
                                "
                            ></span>
                        </a>
                        <div class="entry-header">
                            <h2 class="entry-title">
                                <a href="https://selary-templateify.blogspot.com/2016/03/celebrities-in-vanity-fair-coashella.html" title="Celebrities in the Vanity Fair Coashella Studio">
                                    Celebrities in the Vanity Fair Coashella Studio
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="entry-time mi"><time class="published" datetime="2016-03-17T00:46:00.000-07:00">March 17, 2016</time></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-item item-3">
                        <a title="We Are Best Friends And We Been Every Where Together" class="entry-image-wrap is-image" href="https://selary-templateify.blogspot.com/2016/03/we-are-best-friends-and-we-been-every.html">
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiZF1xWuaIeZoNv1JXLx-uV73u3xN50klM4HcFg22TaRlRG2CxrjWAevp9oDa9kNDGgH0AwEAWScbCBoKZxo0afFITNUE1hJRPanamZZy5LzimU1FniWH42_i1sOVUWULuvx238423erYAlGzm61Oh91fvy8uIuqdl5JY4r-5oCKa-ODQzHvRfrBHGWTZzC/w72-h72-p-k-no-nu/R10.jpg"
                                style="
                                    background-image: url(https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiZF1xWuaIeZoNv1JXLx-uV73u3xN50klM4HcFg22TaRlRG2CxrjWAevp9oDa9kNDGgH0AwEAWScbCBoKZxo0afFITNUE1hJRPanamZZy5LzimU1FniWH42_i1sOVUWULuvx238423erYAlGzm61Oh91fvy8uIuqdl5JY4r-5oCKa-ODQzHvRfrBHGWTZzC/w110-h72-p-k-no-nu/R10.jpg);
                                "
                            ></span>
                        </a>
                        <div class="entry-header">
                            <h2 class="entry-title">
                                <a href="https://selary-templateify.blogspot.com/2016/03/we-are-best-friends-and-we-been-every.html" title="We Are Best Friends And We Been Every Where Together">
                                    We Are Best Friends And We Been Every Where Together
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="entry-time mi"><time class="published" datetime="2016-03-17T00:37:00.000-07:00">March 17, 2016</time></span>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        @endif
      
    </div>
    <div class="main-ads section" id="main-ads" name="Main Ads 1">
        <div class="widget HTML"  id="HTML7">
            <div class="widget-content">
                <a class="ads-here" href="https://www.templateify.com/">Responsive Advertisement</a>
            </div>
        </div>
    </div>
    <div class="main section" id="main" name="Main Posts">
        <div class="widget Blog"  id="Blog1">
            <div class="blog-posts-wrap">
                <div class="title-wrap bp-title">
                    <h3 class="title">Read more</h3>
                    <a class="wt-l" href="/search">View all</a>
                </div>
                <div class="blog-posts hfeed index-post-wrap">
                    @foreach ($items as $key=>$item)
                        <article class="blog-post hentry index-post post-{{$key}}">
                            <a class="entry-image-wrap is-image" href="{{url('news-'.$item->category_slug.'/'.$item->title_slug)}}" title="{{$item->title}}">
                                <span
                                    class="entry-thumb"
                                    data-image="{{ asset('storage/uploads/article_'.$item->user_id.'/'.$item->image)}}"
                                ></span>
                            </a>
                            <div class="entry-header">
                                <span class="entry-category">{{$item->category_name}}</span>
                                <h2 class="entry-title">
                                    <a
                                        class="entry-title-link"
                                        href="{{url('news-'.$item->category_slug.'/'.$item->title_slug)}}"
                                        rel="bookmark"
                                        title="{{$item->title}}"
                                    >
                                        {{$item->title}}
                                    </a>
                                </h2>
                                <p class="entry-excerpt excerpt" style="font-size:16px;">{!! getShortContent(html_entity_decode($articles['technology'][0]->content)) !!}...</p>
                                <div class="entry-meta">
                                    <span class="entry-author mi"><span class="by sp">by</span><span class="author-name">{{$item->user_name}}</span></span>
                                    <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="{{$technology->publish_date}}">{{ getconvertedDate($technology->publish_date) }}</time></span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                 
                </div>
                <div class="blog-pager" id="blog-pager">
                    <a
                        class="blog-pager-older-link load-more btn"
                        data-load=""
                        href="javascript:;"
                        id="selary-pro-load-more-link"
                    >
                        Load More
                    </a>
                    <span class="loading"><div class="loader"></div></span>
                    <span class="no-more load-more btn">
                        That is All
                    </span>
                </div>
            </div>
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
        </div>
    </div>
    <div class="main-ads section" id="main-ads-2" name="Main Ads 2">
        <div class="widget HTML"  id="HTML15">
            <div class="widget-content">
                <a class="ads-here" href="">Responsive Advertisement</a>
            </div>
        </div>
    </div>
  
</main>
@endsection


@section('popular-posts')
<div class="widget-content default-items">
    @foreach ($popular_posts as  $key=>$post)
    @if($key==0)
    <div class="default-item card-style item-0">
        <a
            class="entry-image-wrap before-mask is-image" 
            href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}"
            title="{{$post->title}}"
        >
            <span
                class="entry-thumb"
                data-image="{{ asset('storage/uploads/article_'.$post->user_id.'/'.$post->image)}}"
            ></span>
        </a>
        <div class="entry-header entry-info">
            <span class="entry-category">{{$post->category_name}}</span>
            <h2 class="entry-title" style="font-size:14px !important;">
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
    @if($key >0)
    <div class="default-item item-{{$key}}">
        <a class="entry-image-wrap is-image" href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" title="{{$post->title}}">
            <span
                class="entry-thumb"
                data-image="{{ asset('storage/uploads/article_'.$post->user_id.'/'.$post->image)}}"
            ></span>
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
            <span
                class="entry-thumb lazy-ify"
                data-image="{{ asset('storage/uploads/article_'.$post->user_id.'/'.$post->image)}}"
                style="
                    background-image: url({{ asset('storage/uploads/article_'.$post->user_id.'/'.$post->image)}});
                "
            ></span>
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