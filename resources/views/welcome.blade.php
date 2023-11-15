@extends('layouts.front.main')

@section('main-content')
<main class="bg-white pt-3 main-content pb-5">
               <div class="feature-box">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="card  text-white feature-card">

                           <img src="{{ asset('uploads/article_'.$popular_posts[0]->user_id.'/'.$popular_posts[0]->image) }}"     onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" class="card-img feature-img"
                              alt="...">
                            <div class="overlay"></div>
                           <div class="card-img-overlay">
                             <a class="text-white" href="{{url('news-'.$popular_posts[0]->category_slug.'/'.$popular_posts[0]->title_slug)}}">
                                 <h4 class="card-title">{{$popular_posts[0]->title}}
                              </h4>

                             </a>
                              <p class="card-text">{{ getconvertedDate($popular_posts[0]->publish_date) }}</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 mb-2 mt-2">
                        <img src="{{ asset('assets/images/world-cup.jpg')}}"     onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" width="100%" alt="" srcset="">
                     </div>
                  </div>
               </div>
               <div class="news-box mb-5">
                  <div class="row mt-3">
                     <div class="col-md-12">
                        <div class="card-title">
                           <div>
                              <span>Latest News </span>
                              <a href="{{ url('news-latest') }}" class="see-all text-danger">See all</a>
                           </div>
                           <div class="line-container">
                              <div class="line thick"></div>
                              <div class="line thin"></div>
                           </div>
                        </div>

                        <div class="row">
                                @php

                                    $firstColumnCount = floor((count($latest_posts) - 1) / 4) + 1;
                                    $secondColumnCount = (count($latest_posts) - 1) % 4;
                                @endphp


                            <div class="col-md-3">

                              <div class="block color-dark-blue">
                                 <div class="list-post-block">
                                    <ul class="list-post">

                                      @foreach($latest_posts->take($firstColumnCount) as $key=>$post)
                                       <li class="clearfix">
                                          <div class="post-block-style post-float clearfix">
                                             <div class="post-thumb post-height">
                                                <a href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}">
                                              <img class="img-fluid"
                                                 src="{{ asset('uploads/article_'.$post->user_id.'/'.$post->image) }}"
                                                 onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';"
                                                 alt="" />

                                                </a>
                                             </div>
                                             <div class="post-content">
                                                <h2 class="post-title title-small" style="overflow: hidden;text-overflow: ellipsis;">
                                                   <a href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" >{{getShortContent($post->title)}}</a>
                                                </h2>
                                                <div class="post-meta">
                                                   <span class="post-date">{{ getconvertedDate($post->publish_date) }}</span>
                                                </div>
                                             </div>
                                              <!--Post content end -->
                                          </div>
                                           <!--Post block style end -->
                                       </li>
                                       @endforeach
                                        <!--Li 3 end -->
                                    </ul>
                                     <!--List post end -->
                                 </div>
                                  <!--List post block end -->
                              </div>
                           </div>


                           <div class="col-md-9">
                               <div class="row mt-3">
                                   @foreach ($latest_posts->slice($firstColumnCount) as $post)
                                   <div class="col-md-4 mt-4">
                                          <div class="post-block-style post-float clearfix">
                                       <div class="post-thumb">
                                          <i class="fa fa-play text-danger post-height "
                                             aria-hidden="true"></i>
                                       </div>
                                       <div class="post-content post-height">
                                                <h2 class="post-title title-small" style="overflow: hidden;text-overflow: ellipsis;">
                                                   <a href="{{url('news-'.$post->category_slug.'/'.$post->title_slug)}}" >{{getShortContent($post->title)}}</a>
                                                </h2>
                                          <div class="post-meta">
                                             <span class="post-date">{{ getconvertedDate($post->publish_date) }}</span>
                                          </div>
                                       </div>
                                       <!-- Post content end -->
                                    </div>
                                    <!-- Post block style end -->
                                   </div>
                                   @endforeach
                               </div>
                           </div>

                        </div>
                     </div>
                      @if(array_key_exists('business', $articles))
                     <div class="col-md-12 mb-4">
                        <div>
                           <span>Business News </span>
                              <a href="{{ url('news-business') }}" class="see-all text-danger">See all</a>
                        </div>
                        <div class="line-container">
                           <div class="line thick"></div>
                           <div class="line thin"></div>
                        </div>
                     </div>
                     <div class="row">
                         @if($articles['business'][0])
                        <div class="col-md-3">
                           <div class="block color-dark-blue">
                              <div class="post-block-style clearfix">
                                 <div class="post-thumb">
                                    <a href="{{url('news-'.$articles['business'][0]->category_slug.'/'.$articles['business'][0]->title_slug)}}">
                                    <img     onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" class="img-fluid" src="{{ asset('uploads/article_'.$articles['business'][0]->user_id.'/'.$articles['business'][0]->image)}}"
                                       alt="" />
                                    </a>
                                 </div>
                                 <div class="post-content">
                                    <h2 class="post-title">
                                       <a href="{{url('news-'.$articles['business'][0]->category_slug.'/'.$articles['business'][0]->title_slug)}}">{{$articles['business'][0]->title}}</a>
                                    </h2>
                                    <div class="post-meta">
                                       <span class="post-author"><a href="#">{{$articles['business'][0]->user_name}}</a></span>
                                       <span class="post-date">{{ getconvertedDate($articles['business'][0]->publish_date) }}</span>
                                    </div>
                                    @if(count($articles['business'])>4)
                                    <p>{!! getShortContent(html_entity_decode($articles['business'][0]->content)) !!}...
                                    </p>
                                    @endif
                                 </div>
                                 <!-- Post content end -->
                              </div>
                           </div>
                        </div>
                         @endif

                           <div class="col-md-9">
                               <div class="row mt-3">
                                    @foreach(array_slice($articles['business'], 1) as $key=>$business)
                                   <div class="col-md-4 mt-4">
                                          <div class="post-block-style post-float clearfix">
                                       <div class="post-thumb">
                                          <i class="fa fa-play text-danger post-height "
                                             aria-hidden="true"></i>
                                       </div>
                                       <div class="post-content post-height">
                                                <h2 class="post-title title-small" style="overflow: hidden;text-overflow: ellipsis;">
                                                   <a href="{{url('news-'.$business->category_slug.'/'.$business->title_slug)}}" >{{getShortContent($business->title)}}</a>
                                                </h2>
                                          <div class="post-meta">
                                             <span class="post-author">{{ $business->user_name }}</span>
                                             <span class="post-date">{{ getconvertedDate($business->publish_date) }}</span>
                                          </div>
                                       </div>
                                       <!-- Post content end -->
                                    </div>
                                    <!-- Post block style end -->
                                   </div>
                                   @endforeach
                               </div>
                           </div>
                     </div>
                     @endif
                  </div>
                  <div class="col-md-12 mt-3 mb-4">
                     <div class="col-md-12 mb-2">
                        <div>
                           <span>Latest Videos </span>

                              <a href="{{ url('news-videos') }}" class="see-all text-danger">See all</a>
                        </div>
                        <div class="line-container">
                           <div class="line thick"></div>
                           <div class="line thin"></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="block color-dark-blue">
                              <div class="post-block-style clearfix">
                                 <div class="post-thumb">
                                    <img     onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" class="img-fluid" src="{{ asset('assets/images/artificial-intelligence-1.jpg')}}"
                                       alt="" />
                                    <a class="popup cboxElement"
                                       href="https://www.youtube.com/embed/XhveHKJWnOQ?autoplay=1&amp;loop=1">
                                       <div class="video-icon">
                                          <i class="fa fa-play"></i>
                                       </div>
                                    </a>
                                 </div>
                                 <!-- Post thumb end -->
                                 <div class="post-content">
                                    <h2 class="post-title">
                                       <a href="#">Netcix cuts out the chill with an integrated...</a>
                                    </h2>
                                    <div class="post-meta">
                                       <span class="post-author"><a href="#">John Doe</a></span>
                                       <span class="post-date">Feb 24, 2017</span>
                                    </div>
                                 </div>
                                 <!-- Post content end -->
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="block color-dark-blue">
                              <div class="post-block-style clearfix">
                                 <div class="post-thumb">
                                    <img     onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" class="img-fluid" src="{{ asset('assets/images/artificial-intelligence-1.jpg')}}"
                                       alt="" />
                                    <a class="popup cboxElement"
                                       href="https://www.youtube.com/embed/XhveHKJWnOQ?autoplay=1&amp;loop=1">
                                       <div class="video-icon">
                                          <i class="fa fa-play"></i>
                                       </div>
                                    </a>
                                 </div>
                                 <!-- Post thumb end -->
                                 <div class="post-content">
                                    <h2 class="post-title">
                                       <a href="#">Netcix cuts out the chill with an integrated...</a>
                                    </h2>
                                    <div class="post-meta">
                                       <span class="post-author"><a href="#">John Doe</a></span>
                                       <span class="post-date">Feb 24, 2017</span>
                                    </div>
                                 </div>
                                 <!-- Post content end -->
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="block color-dark-blue">
                              <div class="post-block-style clearfix">
                                 <div class="post-thumb">
                                    <img     onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" class="img-fluid" src="{{ asset('assets/images/artificial-intelligence-1.jpg')}}"
                                       alt="" />
                                    <a class="popup cboxElement"
                                       href="https://www.youtube.com/embed/XhveHKJWnOQ?autoplay=1&amp;loop=1">
                                       <div class="video-icon">
                                          <i class="fa fa-play"></i>
                                       </div>
                                    </a>
                                 </div>
                                 <!-- Post thumb end -->
                                 <div class="post-content">
                                    <h2 class="post-title">
                                       <a href="#">Netcix cuts out the chill with an integrated...</a>
                                    </h2>
                                    <div class="post-meta">
                                       <span class="post-author"><a href="#">John Doe</a></span>
                                       <span class="post-date">Feb 24, 2017</span>
                                    </div>
                                 </div>
                                 <!-- Post content end -->
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="block color-dark-blue">
                              <div class="post-block-style clearfix">
                                 <div class="post-thumb">
                                    <img class="img-fluid"     onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" src="{{ asset('assets/images/artificial-intelligence-1.jpg')}}"
                                       alt="" />
                                    <a class="popup cboxElement"
                                       href="https://www.youtube.com/embed/XhveHKJWnOQ?autoplay=1&amp;loop=1">
                                       <div class="video-icon">
                                          <i class="fa fa-play"></i>
                                       </div>
                                    </a>
                                 </div>
                                 <!-- Post thumb end -->
                                 <div class="post-content">
                                    <h2 class="post-title">
                                       <a href="#">Netcix cuts out the chill with an integrated...</a>
                                    </h2>
                                    <div class="post-meta">
                                       <span class="post-author"><a href="#">John Doe</a></span>
                                       <span class="post-date">Feb 24, 2017</span>
                                    </div>
                                 </div>
                                 <!-- Post content end -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                      @if(array_key_exists('politics', $articles))
                     <div class="col-md-12 mb-4">
                        <div>
                           <span>Politics News </span>
                           <span class="see-all  text-danger">See all</span>
                        </div>
                        <div class="line-container">
                           <div class="line thick"></div>
                           <div class="line thin"></div>
                        </div>
                     </div>
                     <div class="row">
                         @if($articles['politics'][0])
                        <div class="col-md-3">
                           <div class="block color-dark-blue">
                              <div class="post-block-style clearfix">
                                 <div class="post-thumb">
                                    <a href="{{url('news-'.$articles['politics'][0]->category_slug.'/'.$articles['politics'][0]->title_slug)}}">
                                    <img     onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" class="img-fluid" src="{{ asset('uploads/article_'.$articles['politics'][0]->user_id.'/'.$articles['politics'][0]->image)}}"
                                       alt="" />
                                    </a>
                                 </div>
                                 <div class="post-content">
                                    <h2 class="post-title">
                                       <a href="{{url('news-'.$articles['politics'][0]->category_slug.'/'.$articles['politics'][0]->title_slug)}}">{{$articles['politics'][0]->title}}</a>
                                    </h2>
                                    <div class="post-meta">
                                       <span class="post-author"><a href="#">{{$articles['politics'][0]->user_name}}</a></span>
                                       <span class="post-date">{{ getconvertedDate($articles['politics'][0]->publish_date) }}</span>
                                    </div>
                                    @if(count($articles['politics'])>4)
                                    <p>{!! getShortContent(html_entity_decode($articles['politics'][0]->content)) !!}...
                                    </p>
                                    @endif
                                 </div>
                                 <!-- Post content end -->
                              </div>
                           </div>
                        </div>
                         @endif

                           <div class="col-md-9">
                               <div class="row mt-3">
                                    @foreach(array_slice($articles['politics'], 1) as $key=>$politics)
                                   <div class="col-md-4 mt-4">
                                          <div class="post-block-style post-float clearfix">
                                       <div class="post-thumb">
                                          <i class="fa fa-play text-danger post-height "
                                             aria-hidden="true"></i>
                                       </div>
                                       <div class="post-content post-height">
                                                <h2 class="post-title title-small" style="overflow: hidden;text-overflow: ellipsis;">
                                                   <a href="{{url('news-'.$politics->category_slug.'/'.$politics->title_slug)}}" >{{getShortContent($politics->title)}}</a>
                                                </h2>
                                          <div class="post-meta">
                                             <span class="post-author">{{ $politics->user_name }}</span>
                                             <span class="post-date">{{ getconvertedDate($politics->publish_date) }}</span>
                                          </div>
                                       </div>
                                       <!-- Post content end -->
                                    </div>
                                    <!-- Post block style end -->
                                   </div>
                                   @endforeach
                               </div>
                           </div>
                     </div>
                     @endif

                         @if(array_key_exists('technology', $articles))
                     <div class="col-md-12 mb-4 mt-3">
                        <div>
                           <span>Technology News </span>
                           <a href="{{ url('news-technology') }}" class="see-all  text-danger">See all</a>
                        </div>
                        <div class="line-container">
                           <div class="line thick"></div>
                           <div class="line thin"></div>
                        </div>
                     </div>
                     <div class="row">
                         @if($articles['technology'][0])
                        <div class="col-md-3">
                           <div class="block color-dark-blue">
                              <div class="post-block-style clearfix">
                                 <div class="post-thumb">
                                    <a href="{{url('news-'.$articles['technology'][0]->category_slug.'/'.$articles['technology'][0]->title_slug)}}">
                                    <img     onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" class="img-fluid" src="{{ asset('uploads/article_'.$articles['technology'][0]->user_id.'/'.$articles['technology'][0]->image)}}"
                                       alt="" />
                                    </a>
                                 </div>
                                 <div class="post-content">
                                    <h2 class="post-title">
                                       <a href="{{url('news-'.$articles['technology'][0]->category_slug.'/'.$articles['technology'][0]->title_slug)}}">{{$articles['technology'][0]->title}}</a>
                                    </h2>
                                    <div class="post-meta">
                                       <span class="post-author"><a href="#">{{$articles['technology'][0]->user_name}}</a></span>
                                       <span class="post-date">{{ getconvertedDate($articles['technology'][0]->publish_date) }}</span>
                                    </div>
                                    @if(count($articles['technology'])>4)
                                    <p>{!! getShortContent(html_entity_decode($articles['technology'][0]->content)) !!}...
                                    </p>
                                    @endif
                                 </div>
                                 <!-- Post content end -->
                              </div>
                           </div>
                        </div>
                         @endif

                           <div class="col-md-9">
                               <div class="row mt-3">
                                    @foreach(array_slice($articles['technology'], 1) as $key=>$technology)
                                   <div class="col-md-4 mt-4">
                                          <div class="post-block-style post-float clearfix">
                                       <div class="post-thumb">
                                          <i class="fa fa-play text-danger post-height "
                                             aria-hidden="true"></i>
                                       </div>
                                       <div class="post-content post-height">
                                                <h2 class="post-title title-small" style="overflow: hidden;text-overflow: ellipsis;">
                                                   <a href="{{url('news-'.$technology->category_slug.'/'.$technology->title_slug)}}" >{{getShortContent($technology->title)}}</a>
                                                </h2>
                                          <div class="post-meta">
                                             <span class="post-author">{{ $technology->user_name }}</span>
                                             <span class="post-date">{{ getconvertedDate($technology->publish_date) }}</span>
                                          </div>
                                       </div>
                                       <!-- Post content end -->
                                    </div>
                                    <!-- Post block style end -->
                                   </div>
                                   @endforeach
                               </div>
                           </div>
                     </div>
                     @endif

               </div>

            </main>
@endsection
