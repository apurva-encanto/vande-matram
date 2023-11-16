<div class="left-side-menu">

<div class="h-100" data-simplebar>

    <!-- User box -->
    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul id="side-menu">

            <li class="menu-title">Navigation</li>

            <li>
                <a href="{{route('admin.home')}}"   class="active">
                    <i class="mdi mdi-view-dashboard-outline"></i>
                    <span> Dashboards </span>
                </a>
            </li>
            <li>
                <a href="#Category" data-bs-toggle="collapse">
                    <i class="mdi mdi-clipboard-multiple-outline"></i>
                    <span>  Category </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse " id="Category">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{route('admin.category.add')}}">Add News Category</a>
                        </li>
                        <li>
                            <a href="{{route('admin.category.list')}}">Category's List</a>
                        </li>

                    </ul>
                </div>
            </li>


            <li>
                <a href="#Article" data-bs-toggle="collapse">
                    <i class="mdi mdi-clipboard-multiple-outline"></i>
                    <span>  Article </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse " id="Article">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{route('admin.article.add')}}">Add New Article</a>
                        </li>
                        <li>
                            <a href="{{route('admin.article.pending')}}">Pending Article</a>
                        </li>
                        <li>
                            <a href="{{route('admin.article.list')}}">Article's List</a>
                        </li>

                    </ul>
                </div>
            </li>

            {{-- <li>
                <a href="#sidebarDashboards" data-bs-toggle="collapse"  >
                    <i class="mdi mdi-briefcase-check-outline"></i>
                    <span> Create New Page </span>
                </a>
            </li> --}}

            <li>
                <a href="#sidebarCrm" data-bs-toggle="collapse">
                    <i class="mdi mdi-account-multiple"></i>
                    <span>  Journalist </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse " id="sidebarCrm">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{route('admin.journalist.add')}}">Add New Journalist</a>
                        </li>
                        <li>
                            <a href="{{route('admin.journalist.pending')}}">Pending Journalist</a>
                        </li>
                        <li>
                            <a href="{{route('admin.journalist.list')}}">Journalist's List</a>
                        </li>

                    </ul>
                </div>
            </li>

            {{-- <li>
                <a href="#sidebarDashboards" data-bs-toggle="collapse"  >
                    <i class="mdi  mdi-tools"></i>
                    <span> Settings </span>
                </a>
            </li> --}}
           <!-- <li>
                <a href="#sidebarProjects" data-bs-toggle="collapse">
                    <i class="mdi mdi-briefcase-check-outline"></i>
                    <span> Projects </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects">
                    <ul class="nav-second-level">
                        <li>
                            <a href="project-list.html">List</a>
                        </li>
                        <li>
                            <a href="project-detail.html">Detail</a>
                        </li>
                        <li>
                            <a href="project-create.html">Create Project</a>
                        </li>
                    </ul>
                </div>
            </li>-->

        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
