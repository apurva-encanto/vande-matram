@extends('layouts.front.main')
<style>
    
</style>
@section('main-content')
<main class="has-m has-ad-m" id="main-wrapper" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
  <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 138px;">
      <div class="main section" id="main" name="Main Posts">
          <div class="widget Blog" data-version="2" id="Blog1">
              <div class="blog-posts-wrap">
                  <div class="queryMessage">
                      <span class="query-info query-label query-success">{{$category->name}}</span>
                  </div>
                  <div class="blog-posts hfeed index-post-wrap">
                    @if (count($items) >0)
                    @foreach ($items  as $key=>$item )
                    <article class="blog-post hentry index-post post-0">
                        <a class="entry-image-wrap is-image" href="{{url('news-'.$item->category_slug.'/'.$item->title_slug)}}" title="{{$item->category_name}}">
                            <span
                                class="entry-thumb lazy-ify"
                                data-image="{{ asset('storage/uploads/article_'.$item->user_id.'/'.$item->image)}}"
                                style="
                                    background-image: url({{ asset('storage/uploads/article_'.$item->user_id.'/'.$item->image)}});
                                "
                            ></span>
                        </a>
                        <div class="entry-header">
                            <span class="entry-category">{{$item->category_name}}</span>
                            <h2 class="entry-title">
                                <a class="entry-title-link" href="{{url('news-'.$item->category_slug.'/'.$item->title_slug)}}" rel="bookmark" title="{{$item->category_name}}">
                                    {{$item->title}}
                                </a>
                            </h2>
                            <p class="entry-excerpt excerpt">{!! getShortContent(html_entity_decode($item->content)) !!}...</p>
                            <div class="entry-meta">
                                <span class="entry-author mi"><span class="by sp">by</span><span class="author-name">{{$item->user_name}}</span></span>
                                <span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="{{$item->publish_date}}">{{ getconvertedDate($item->publish_date) }}</time></span>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    @endif
                                     
            
                  </div>
                  <div class="blog-pager" id="blog-pager">
                      <span class="no-more load-more btn show" style="font-weight: 600;">
                         @if(count($items) >0) That is All @else No News Found @endif
                      </span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

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