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
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">547</span></h3>
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
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Pending Article</p>
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
                                                <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                                    <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">0.58</span>%</h3>
                                                    <p class="text-muted mb-1 text-truncate">Conversion</p>
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
                                                <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                                    <i class="fe-eye font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">5</span>k</h3>
                                                    <p class="text-muted mb-1 text-truncate">Today's Visits</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                        

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
    
                                        <h4 class="header-title mb-3">Journalist's Details</h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-hover table-nowrap table-centered m-0">
    
                                                <thead class="table-light">
                                                    <tr>
                                                        <th colspan="2">Profile</th>
                                                        <th>Role</th>
                                                        <th>Phone Number</th>
                                                        <th>Email Id</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 36px;">
                                                            <img src="{{ asset('assets/images/users/user-2.jpg')}}" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                                        </td>
        
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Tomaslau</h5>
                                                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                                        </td>
        
                                                        <td>
                                                            <h5 class="m-0 fw-normal">City Manager</h5>
                                                        </td>
        
                                                        <td>
                                                            +91 99999 99999
                                                        </td>
        
                                                        <td>
                                                            Tom@Vandemataram.com
                                                        </td>
        
                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                                        </td>
                                                    </tr>
        
                                                    <tr>
                                                        <td style="width: 36px;">
                                                            <img src="{{ asset('assets/images/users/user-3.jpg')}}" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                                        </td>
        
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Erwin E. Brown</h5>
                                                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                                        </td>
        
                                                        <td>
                                                            <h5 class="m-0 fw-normal"> Agent</h5>
                                                        </td>
        
                                                        <td>
                                                            +91 99999 99999
                                                        </td>
        
                                                        <td>
                                                            Tom@Vandemataram.com
                                                        </td>
        
        
                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                                        </td>
                                                    </tr>
                                                    
                                              
    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
    
                                        <h4 class="header-title mb-3">Review Article</h4>
    
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
                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Contraband airdropping and exchange of Eid pleasantries</h5>
                                                        </td>
        
                                                        <td>
                                                            Jue 15, 2023
                                                        </td>
        
                                                        <td>
                                                            <span class="badge bg-soft-warning text-warning">Pending</span>
                                                        </td>
        
                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>
    
                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">TS Singhdeo vows to fulfill poll promises</h5>
                                                        </td>
        
                                                        <td>
                                                            June 12, 2023
                                                        </td>
        
        
                                                        <td>
                                                            <span class="badge bg-soft-success text-success">Approve</span>
                                                        </td>
        
                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>
    
                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">TS Singhdeo vows to fulfill poll promises</h5>
                                                        </td>
        
                                                        <td>
                                                            June 10, 2023
                                                        </td>
         
                                                        <td>
                                                            <span class="badge bg-soft-success text-success">Approve</span>
                                                        </td>
        
                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>
    
                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Affiliates</h5>
                                                        </td>
        
                                                        <td>
                                                            Oct 03, 2018
                                                        </td>
         
                                                        <td>
                                                            <span class="badge bg-soft-danger text-danger">Decline</span>
                                                        </td>
        
                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>
    
                                                    
    
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