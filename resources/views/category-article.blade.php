@extends('layouts.front.main')

@section('main-content')
<style>
  svg{
      width:25px;
  }

  .post-block-style{
      min-height:370px;
  }
  .leading-5{
      margin-top:10px;
  }
</style>
 <main class="bg-white pt-3 main-content pb-5">
               <div class="news-box mb-4" style="min-height: 250px;">
                  <div class="row mt-3">

                     <div class="col-md-12 mb-2">
                        <div>
                           <h5 class="mx-3 sub-heading">{{@$category->name}}</h5>
                        </div>
                     </div>
                     <div class="row mx-1">
                           @if (count($items) >0)
                            @foreach ($items  as $key=>$item )
                                <div class="col-md-4">
                                   <div class="block color-dark-blue block-border">
                                      <div class="post-block-style clearfix">
                                         <div class="post-thumb category-img">
                                            <a href="{{url('news-'.$item->category_slug.'/'.$item->title_slug)}}">
                                            <img class="img-fluid"  onerror="this.src='{{ asset('assets/images/default-img.jpg') }}';" src="{{ asset('uploads/article_'.$item->user_id.'/'.$item->image)}}"
                                               alt="" />
                                            </a>
                                         </div>
                                         <div class="post-content px-1">
                                            <h2 class="post-title">
                                               <a href="{{url('news-'.$item->category_slug.'/'.$item->title_slug)}}">{{$item->title}}</a>
                                            </h2>
                                            <div class="post-meta">
                                               <span class="post-author"><a href="#">{{$item->user_name}}</a></span>
                                               <span class="post-date">{{ getconvertedDate($item->publish_date) }}</span>
                                            </div>
                                            <p>{!! getShortContent(html_entity_decode($item->content)) !!}..
                                            </p>
                                         </div>
                                         <!-- Post content end -->
                                      </div>
                                   </div>
                                </div>
                                @endforeach
                            @endif


                        <div class="col-md-12 text-center">

                            @if(count($items) >0) {{ $items->links() }}  @else No News Found @endif
                           <!--<button class="btn load-more">Load More</button>-->
                        </div>

                     </div>
                  </div>
               </div>

            </main>

@endsection
