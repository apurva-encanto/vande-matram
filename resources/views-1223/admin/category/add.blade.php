@extends('layouts.admin.index')
@push('custom-style')
<link rel="stylesheet" href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}"> 
<link rel="stylesheet" href="{{asset('assets/libs/select2/css/select2.min.css')}}">   
@endpush
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
                                            <li class="breadcrumb-item active">Add New Category</li>
                                        </ol>
                                    </div>
                                   
                                    <h4 class="page-title">Add New Category</h4>
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
                                                            Add New Category
                                                        </h5> 
                                                    </div>
                                                   
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-xl-6">
                                                <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate action="{{ route('admin.category.create')}}" >
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="Category Name" class="form-label">Category Name</label>
                                                        <input type="text" value="{{old('name')}}"  name="name" class="form-control" placeholder="Category Name" required>
                                                        @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                       @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="project-overview" class="form-label">Category Description</label>
                                                        <textarea  value="{{old('description')}}" class="form-control" name="description" id="project-overview"  rows="5" placeholder="Category Description"></textarea>
                                                  
                                                                <div class="invalid-feedback">
                                                                 Please enter a Description.
                                                                </div>
                                                    </div> 
                                                  
                                            </div> <!-- end col-->

                                           
                                        </div>
                                        
                                        <div class="row mt-3">
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle me-1"></i> Submit</button>
                                                <button type="button" onclick="redirectToRoute()" class="btn btn-light waves-effect waves-light m-1"><i class="fe-x me-1"></i> Cancel</button>
                                            </div>
                                        </div>
                                        <!-- end inbox-rightbar-->
                                        </form>

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
 <script src="{{ asset('assets/js/pages/form-validation.init.js')}}"></script>   
 <script src="{{ asset('assets/libs/select2/js/select2.min.js')}}"></script>  
 <script src="{{asset('assets/libs/quill/quill.min.js')}}"></script>
 <script src="{{ asset('assets/js/pages/add-product.init.js')}}"></script>  

 <script>


 </script>

<script>
    function redirectToRoute() {
        window.location.href = "{{ route('admin.category.list') }}";
    }
</script>

 @endpush