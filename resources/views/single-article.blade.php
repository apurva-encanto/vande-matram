@extends('layouts.front.main')

@section('main-content')
<style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      border: 1px solid #dee2e6;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border: 1px solid #dee2e6;
    }
</style>

<main class="main-details pb-0 container">
                    <div class="row">
                        <div class="col-md-8 bg-white">
                            <div class="single-post mt-3">
                                <div class="post-title-area">
                                    <h2 class="post-title">
                                        {{$article->title}}
                                    </h2>
                                    <div class="post-meta">
                                       <span class="post-author"><a href="#">{{$article->user_name}}</a></span>
                                        <span class="post-date"><i class="fa fa-clock-o"></i> {{ getconvertedDate($article->publish_date) }}</span>
                                        <span class="post-hits"><i class="fa fa-eye"></i> {{$article->views}}</span>
                                    </div>
                                </div>
                                <!-- Post title end -->

                                <div class="post-content-area">
                                    <div class="post-media post-featured-image">
                                        <a href="{{ asset('uploads/article_'.$article->user_id.'/'.$article->image)}}" class="gallery-popup cboxElement"><img
                                         onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';"
                                                src="{{ asset('uploads/article_'.$article->user_id.'/'.$article->image)}}" class="img-fluid" alt="" /></a>
                                    </div>
                                    <div class="entry-content">
                                     <b>@if(!empty($article->city)){{ $article->city }} : @endif </b>  {!! html_entity_decode($article->content) !!}
                                    </div>
                                    <!-- Entery content end -->

                                    <!-- Share items end -->
                                </div>
                                <!-- post-content end -->
                            </div>



                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <img src="{{ asset('assets/images/world-cup.jpg')}}"  onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" alt="">
                                    <div>
                                        <div class="col-md-12 mt-3 bg-white" style="padding: 2px;">
                                            <div class="widget color-default mb-3 ">
                                                <h3 class="block-title"><span>
                              ప్రముఖ వార్తలు                  </span></h3>

                                                <div class="list-post-block mb-3">
                                                    <ul class="list-post mb-3">
                                                        @if(count($popular_posts) >0)

                                                        <!-- Li 1 end -->
                                                         @foreach ($popular_posts as $key=>$post)
                                                        <li class="clearfix">
                                                            <div class="post-block-style post-float clearfix">
                                                                <div class="post-thumb">
                                                                    <a href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}">
                                                                        <img class="img-fluid"  onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';"
                                                                            src="{{ asset('uploads/article_'.$post->user_id.'/'.$post->image)}}"
                                                                            alt="" />
                                                                    </a>
                                                                </div>
                                                                <!-- Post thumb end -->

                                                                <div class="post-content">
                                                                    <h2 class="post-title title-small" style="overflow: hidden;text-overflow: ellipsis;">
                                                                        <a href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}"> {{$post->title}}</a>
                                                                    </h2>
                                                                    {{-- <div class="post-meta">
                                                                        <span class="post-date">{{ getconvertedDate($post->publish_date) }}</span>
                                                                    </div> --}}
                                                                </div>
                                                                <!-- Post content end -->
                                                            </div>
                                                            <!-- Post block style end -->
                                                        </li>
                                                        @endforeach
                                                          @else
                                                          <li class="clearfix">
                                                            <div class="post-block-style post-float clearfix text-center bg-light">
                                                                    <h2 class="post-title title-small" style="overflow: hidden;text-overflow: ellipsis;">
                                                                        <a> No News Found</a>
                                                                    </h2>
                                                            </div>
                                                            <!-- Post block style end -->
                                                        </li>
                                                        @endif
                                                        <!-- Li 2 end -->


                                                        <!-- Li 4 end -->
                                                    </ul>
                                                    <!-- List post end -->
                                                </div>
                                                <!-- List post block end -->
                                            </div>

                                        </div>
                                        <div class="col-md-12 mt-3 bg-white" style="padding: 2px;">
                                            <div class="widget color-default ">
                                                <h3 class="block-title"><span>
                              మీరు దీన్ని ఇష్టపడవచ్చు                      
                                                    </span></h3>

                                                <div class="list-post-block mb-3">
                                                    <ul class="list-post mb-3">
                                                     @if(count($similar_posts) >0)
                                                     @foreach($similar_posts as $key=>$post)
                                                        <li class="clearfix">
                                                            <div class="post-block-style post-float clearfix">
                                                                <div class="post-thumb">
                                                                    <a href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}">
                                                                        <img class="img-fluid"  onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';"
                                                                            src="{{ asset('uploads/article_'.$post->user_id.'/'.$post->image)}}" alt="" />
                                                                    </a>
                                                                </div>
                                                                <!-- Post thumb end -->

                                                                <div class="post-content">
                                                                    <h2 class="post-title title-small" style="overflow: hidden;text-overflow: ellipsis;">
                                                                        <a href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}">{{$post->title}}</a>
                                                                    </h2>

                                                                </div>
                                                                <!-- Post content end -->
                                                            </div>
                                                            <!-- Post block style end -->
                                                        </li>
                                                         @endforeach
                                                         @else
                                                          <li class="clearfix m-1">
                                                            <div class="post-block-style post-float clearfix text-center bg-light">
                                                                    <h2 class="post-title title-small" style="overflow: hidden;text-overflow: ellipsis;">
                                                                        <a> No News Found</a>
                                                                    </h2>
                                                            </div>
                                                            <!-- Post block style end -->
                                                        </li>
                                                        @endif
                                                        <!-- Li 1 end -->

                                                    </ul>
                                                    <!-- List post end -->
                                                </div>
                                                <!-- List post block end -->
                                            </div>

                                        </div>
                                        <div class="col-md-12"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
@if(!empty($next_article))
                        @php
                        
                        $arraySecond=[];
                        $arrayFirst=array_chunk($next_article, 4)[0];
                        if(count($next_article) >4){
                        $arraySecond=array_chunk($next_article, 4)[1];
                        }
                        @endphp

                        <div class="col-md-12 bg-white mt-3">
                            <h5 class="card-title pt-2">
                                తదుపరి చదవండి
                            </h5>
                            <div class="row mb-5">
                                <div class="col-lg-6 ">
                                    @foreach($arrayFirst  as $key=>$post)
                                        @if($key==0)
                                           <div class="block color-dark-blue">

                                            <div class="post-block-style clearfix">
                                                <div class="post-thumb">
                                                    <a href="{{url('news-'.$post['category_slug'].'/'.$post['title_slug'])}}">
                                                        <img  onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" class="img-fluid" src="{{ asset('uploads/article_'.$post['user_id'].'/'.$post['image'])}}" alt="" />
                                                    </a>
                                                </div>
                                                <div class="post-content">
                                                    <h2 class="post-title">
                                                        <a href="{{url('news-'.$post['category_slug'].'/'.$post['title_slug'])}}">{{$post['title']}}</a>
                                                    </h2>
                                                    <div class="post-meta">
                                                        <span class="post-date">{{ getconvertedDate($post['publish_date']) }}</span>
                                                    </div>
                                                    <p>{{getShortContent($post['title'])}}...</p>
                                                </div>
                                                <!-- Post content end -->
                                            </div>

                                        </div>
                                        <hr>
                                        @else

                                           <div class="block color-dark-blue mt-2">
                                                    <div class="clearfix">
                                                        <div class="post-block-style post-float clearfix">
                                                            <div class="post-thumb post-height">
                                                                <a href="{{url('news-'.$post['category_slug'].'/'.$post['title_slug'])}}">
                                                                    <img   onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" class="img-fluid" src="{{ asset('uploads/article_'.$post['user_id'].'/'.$post['image'])}}" alt="" />
                                                                </a>
                                                            </div>

                                                            <div class="post-content">
                                                                <h2 class="post-title title-small">
                                                                    <a href="{{url('news-'.$post['category_slug'].'/'.$post['title_slug'])}}">{{$post['title']}}</a>
                                                                </h2>
                                                                <div class="post-meta">
                                                                    <span class="post-date">{{ getconvertedDate($post['publish_date']) }}</span>
                                                                </div>
                                                            </div>
                                                            <!-- Post content end -->
                                                        </div>
                                                        <!-- Post block style end -->
                                                    </div>

                                        </div>

                                        @endif
                                    @endforeach

                                </div>
                               <div class="col-lg-6 ">
                                   @foreach($arraySecond  as $key=>$post)
                                        @if($key==0)
                                           <div class="block color-dark-blue">

                                            <div class="post-block-style clearfix">
                                                <div class="post-thumb">
                                                    <a href="{{url('news-'.$post['category_slug'].'/'.$post['title_slug'])}}">
                                                        <img  onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" class="img-fluid" src="{{ asset('uploads/article_'.$post['user_id'].'/'.$post['image'])}}" alt="" />
                                                    </a>
                                                </div>
                                                <div class="post-content">
                                                    <h2 class="post-title">
                                                        <a href="{{url('news-'.$post['category_slug'].'/'.$post['title_slug'])}}">{{$post['title']}}</a>
                                                    </h2>
                                                    <div class="post-meta">
                                                        <span class="post-date">{{ getconvertedDate($post['publish_date']) }}</span>
                                                    </div>
                                                    <p>{{getShortContent($post['title'])}}...</p>
                                                </div>
                                                <!-- Post content end -->
                                            </div>

                                        </div>
                                        <hr>

                                        @else
                                           <div class="block color-dark-blue mt-2">
                                                    <div class="clearfix">
                                                        <div class="post-block-style post-float clearfix">
                                                            <div class="post-thumb post-height">
                                                                <a href="{{url('news-'.$post['category_slug'].'/'.$post['title_slug'])}}">
                                                                    <img   onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" class="img-fluid" src="{{ asset('uploads/article_'.$post['user_id'].'/'.$post['image'])}}" alt="" />
                                                                </a>
                                                            </div>

                                                            <div class="post-content">
                                                                <h2 class="post-title title-small">
                                                                    <a href="{{url('news-'.$post['category_slug'].'/'.$post['title_slug'])}}">{{$post['title']}}</a>
                                                                </h2>
                                                                <div class="post-meta">
                                                                    <span class="post-date">{{ getconvertedDate($post['publish_date']) }}</span>
                                                                </div>
                                                            </div>
                                                            <!-- Post content end -->
                                                        </div>
                                                        <!-- Post block style end -->
                                                    </div>

                                        </div>

                                        @endif
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
@endif
                </main>
@endsection
