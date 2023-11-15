<nav class="navbar navbar-expand-lg nav-header">
               <div class="main-header">
                  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                     data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                     aria-label="Toggle navigation">
                  <i class="fa fa-bars text-white" aria-hidden="true"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                     <ul class="navbar-nav">
                        <li class="nav-item text-center bg-dark">
                           <a class="nav-link active" aria-current="page" href="{{url('/')}}"><i style="font-size: 24px;"
                              class="fa fa-home" aria-hidden="true"></i></a>
                        </li>
                         @foreach ($categories->take(8) as $category)
                            <li class="nav-item">
                               <a class="nav-link" href="{{ url('news-'.$category->slug) }}">{{ ucfirst(strtolower($category->name)) }}</a>
                            </li>
                         @endforeach
                          @if(count($categories) >8)

                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                              data-bs-toggle="dropdown" aria-expanded="false">
                           More
                           </a>
                           <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                             @foreach ($categories->slice(8) as $category)
                               <li><a class="dropdown-item" href="{{ url('news-'.$category->slug) }}">{{ ucfirst(strtolower($category->name)) }}</a></li>
                              @endforeach
                           </ul>
                        </li>
                         @endif
                     </ul>
                  </div>
               </div>
</nav>
