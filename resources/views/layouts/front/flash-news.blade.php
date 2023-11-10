<div class="d-flex mt-1">
   <span class="flash-news-text">Flash News</span>
   <marquee style="">
          @foreach($top_news as $news)
          <span style="margin-right: 10px;"><i class="fa fa-star text-warning mx-2"></i>{{$news->title}}</span>
          @endforeach
   </marquee>
</div>