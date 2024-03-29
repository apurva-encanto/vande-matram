@extends('layouts.admin.index')
@section('content')
<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                      <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Vandemataram</a></li> 
                                            
                                            
                                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}"> Dashoard</a></li> 
                                            <li class="breadcrumb-item active">Pending Agent's List</li>
                                        </ol>
                                    </div>
                                   
                                    <h4 class="page-title">Pending Agent's List</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- end row-->

                        <!-- TOTAL DIV-->

                        <div class="row">

                            <!-- Right Sidebar -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Left sidebar -->
                                        <!-- End Left sidebar -->

                                        <div class=" "> 
                                            <div class="row mt-2 border-bottom border-light">
                                                <div class="d-flex align-items-start mb-2 ">
                                                    
                                                    <div class="w-100">
                                                        <h5 class="mt-0 mb-0 font-15">
                                                            Pending Agent's List
                                                        </h5> 
                                                        
                                                    </div>
                                                    <a href="{{route('admin.journalist.add')}}" class="btn btn-primary">Add</a>
                                                </div>

                                            </div>  
                                        </div>
                                        <div class="mb-2 p-2">
                                            <div class="row row-cols-sm-auto g-2 align-items-center">
                                          
                                                <div class="col-12 text-sm-center">
                                                    <select id="demo-foo-filter-status" class="form-select form-select-sm">
                                                        <option value="">Show all</option>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                        <option value="suspended">Suspended</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Success</strong> {{ $message }}.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                         @endif   
                                        
                                        <div class="table-responsive">
                                            <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                                <thead>
                                                <tr>
                                                    <th data-toggle="true" style="background: #eee;">First Name</th>
                                                    <th style="background: #eee;">Last Name</th>
                                                    <th style="background: #eee;" data-hide="phone">Job Role</th>
                                                    <th style="background: #eee;">Action</th>
                                                    <th style="background: #eee;" data-hide="phone, tablet">Date of Join</th>
                                                    <th  style="background: #eee;" data-hide="phone, tablet">Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach ($users as $user )
                                                <tr>
                                                    <td>{{$user->first_name}}</td>
                                                    <td>{{$user->last_name}}</td>
                                                    <td class="text-uppercase">{{$user->role}}</td>
                                                    <td>
                                                        <a href="{{ route('admin.journalist.edit',$user->user_id) }}" class="btn btn-xs btn-info mb-1"><i class="mdi mdi-pencil"></i></a>
                                                        <a  data-bs-toggle="modal" data-bs-target="#danger-alert-modal{{$user->id}}" class="btn btn-xs btn-danger mb-1"><i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                    <td>{{$user->start_date}}</td>
                                                    <td>
                                                        @if($user->status=='active')
                                                        <span class="badge label-table bg-success">Active</span>
                                                        @else
                                                        <span class="badge label-table bg-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                </tr>

                                                <div id="danger-alert-modal{{$user->id}}" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content modal-filled bg-danger">
                                                            <div class="modal-body p-4">
                                                                <div class="text-center">
                                                                <form action="{{ route('admin.journalist.delete',$user->user_id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <i class="dripicons-wrong h1 text-white"></i>
                                                                    <h4 class="mt-2 text-white">Delete User</h4>
                                                                    <p class="mt-3 text-white">Are you sure you want to delete <strong>{{$user->name}}</strong> .</p>
                                                                    <button type="submit" class="btn btn-light my-2" >Continue</button>
                                                                </form>  
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div>
                                                @endforeach                                                
                                              
                                                </tbody>
                                                <tfoot>
                                                <tr class="active">
                                                    <td colspan="5">
                                                        <div class="text-end">
                                                            <ul class="pagination pagination-rounded justify-content-end footable-pagination mb-0"></ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div> <!-- end .table-responsive 
                                        
                                        <div class="row mt-3">
                                            <div class="col-12 text-center">
                                                <button type="button" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle me-1"></i> Submit</button>
                                                <button type="button" class="btn btn-light waves-effect waves-light m-1"><i class="fe-x me-1"></i> Cancel</button>
                                            </div>
                                        </div>
                                          end inbox-rightbar-->

                                        <div class="clearfix"></div>
                                    </div>
                                </div> <!-- end card -->

                            </div> <!-- end Col -->
                        </div><!-- End row -->

                        <!-- TOTAL DIV ENDS-->



                         

                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy;  Vandemataram News. All Rights Reserved.
                            </div>
                             
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

@endsection

@push('custom-scripts')
    <script src="{{asset('assets/libs/footable/footable.all.min.js')}}"></script>
        <!-- Init js -->
        <script src="{{ asset('assets/js/pages/foo-tables.init.js')}}"></script>
@endpush