@extends('layouts.agent.index')

@section('content')
<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">Agent Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                                    <i class="fe-clipboard  font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$total_articles->count()}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total Article</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                                    <i class="fe-clock  font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$pending_articles->count()}}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Your Pending Article</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                        
                        </div>
                        <!-- end row-->

                        

                            <div class="col-xl-12">
                                <div class="card m-2">
                                    <div class="card-body p-2">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                              <small class="btn btn-secondary btn-sm">view all</small>
                                            </a>
                                           </div>
                                        </div>
                                        
    
                                        <h4 class="header-title mb-3 px-1">Your Pending Articles</h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-nowrap table-hover table-centered m-0">
    
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Article</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($pending_articles as $key=>$article)
                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">{{$article->title }}</h5>
                                                        </td>
        
                                                        <td>
                                                            {{getconvertedDate($article->publish_date)}}
                                                        </td>
        
                                                        <td>
                                                           <span class="badge bg-soft-warning text-warning">Pending</span>
                                                       
                                                        </td>
        
                                                        <td>
                                                            <a href="{{ route('manager.article.edit',$article->id) }}" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
    
                                                </tbody>
                                            </table>
                                        </div> <!-- end .table-responsive-->
                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Vandemataram News. All Rights Reserved.
                            </div>
                            
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
 @endsection           