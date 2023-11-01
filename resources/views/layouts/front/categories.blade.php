<div class="selary-pro-main-nav section" id="selary-pro-main-nav" name="Header Menu">
    <div class="widget LinkList show-menu"  id="LinkList101">
        <a class="mobile-menu-toggle" href="javascript:;" role="button" title="Menu"></a>
        <ul id="selary-pro-main-nav-menu" role="menubar">
            <li><a href="{{url('/')}}" role="menuitem">Home</a></li>           
            @foreach ($categories->take(7) as $category)
            <li><a href="https://www.templateify.com/2023/10/selary-blogger-template.html" role="menuitem">{{ $category->name }}</a></li>
            @endforeach
            @if(count($categories) >7)

            <li class="has-sub">
                <a href="#" role="menuitem">More</a>
                <ul class="sub-menu m-sub"></ul>
                <ul class="sub-menu2 m-sub">
                    @foreach ($categories->slice(7) as $category)
                    <li><a href="href="{{ url('news-'.$category->slug) }}"" role="menuitem">{{ $category->name }}</a></li>
                    @endforeach
              </ul>
            </li>
            @endif

        </ul>
    </div>
</div>