<div class="d-flex mt-1">
   <span class="flash-news-text">ఫ్లాష్ వార్తలు</span>
   <marquee style="">
          @foreach($top_news as $news)
          <span style="margin-right: 10px;"><i class="fa fa-star text-warning mx-2"></i>{{$news->title}}</span>
          @endforeach
   </marquee>
</div>