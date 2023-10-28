<nav class="navbar navbar-expand-lg navbar-category">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">
            <span class="material-symbols-outlined" style="font-size: 26px;">
                home
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @foreach ($categories->take(7) as $category)
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ url('news-'.$category->slug) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
                
                @if(count($categories) >7)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">More
                        <span class="material-symbols-outlined">
                            keyboard_arrow_down
                        </span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($categories->slice(7) as $category)
                            <li><a class="dropdown-item text-uppercase" href="{{ url('news-'.$category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endif
              
               
            </ul>
        </div>
    </div>
</nav>