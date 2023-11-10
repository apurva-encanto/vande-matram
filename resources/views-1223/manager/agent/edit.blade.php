@extends('layouts.manager.index')
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
                                            
                                            
                                            <li class="breadcrumb-item"><a href="dashboard.html"> Dashoard</a></li> 
                                            <li class="breadcrumb-item active">Edit Agent</li>
                                        </ol>
                                    </div>
                                   
                                    <h4 class="page-title">Edit Agent</h4>
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
                                                            Edit Agent
                                                        </h5> 
                                                    </div>
                                                   
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-xl-6">
                                                <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate action="{{ route('manager.agent.update',$user->user_id) }}" >
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="First Name" class="form-label">First Name</label>
                                                        <input type="text" value="{{$user['first_name']}}"  name="first_name" class="form-control" placeholder="First Name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Last Name" class="form-label">Last Name</label>
                                                        <input type="text" value="{{$user['last_name']}}"   name="last_name" class="form-control" placeholder="Last Name" required>
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="Email Id" class="form-label">Email Id</label>
                                                        <input type="email" value="{{$user['email']}}" name="email" class="form-control" placeholder="Email Id" required>
                                                        @error('email')
                                                            <div class="text-danger mt-1">{{ $message }}</div>
                                                        @enderror
                                                            <div class="invalid-feedback">
                                                            Please enter a valid Email Address.
                                                            </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Password" class="form-label">Password</label>
                                                        <input type="password" value=""  name="password" class="form-control" placeholder="Password" >
                                                            <div class="invalid-feedback">
                                                            Please enter a Password.
                                                            </div>
                                                            @error('password')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="Phone Number" class="form-label">Phone Number</label>
                                                        <input type="text" value="{{$user['phone']}}"  name="phone" class="form-control" placeholder="Phone Number" required>
                                                            <div class="invalid-feedback">
                                                              Please enter a Phone Number.
                                                            </div>
                                                            @error('phone')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                    </div>
                                                                                                        
                                                   
                                                    
                                                   
 

                                            </div> <!-- end col-->

                                            <div class="col-xl-6">
                                                <div class="mb-3">
                                                    <label for="Last Name" class="form-label">Area</label>
                                                    <input type="text" value="{{$user['area']}}"  name="area" required class="form-control" required placeholder="Area">
                                             
                                                            <div class="invalid-feedback">
                                                             Please enter a Area.
                                                            </div>
                                                </div>

                                                  
                                                    <div class="mb-3">
                                                        <label for="project-overview" class="form-label">Address</label>
                                                        <textarea  value="" class="form-control" name="address" id="project-overview" required rows="5" placeholder="Address">{{$user['address']}}</textarea>
                                                  
                                                                <div class="invalid-feedback">
                                                                 Please enter a Address.
                                                                </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <!-- Date View -->
                                                            <div class="mb-3">
                                                                <label class="form-label">Start Date</label>
                                                                <input  value="{{$user['start_date']}}" type="date" class="form-control" name="start_date" required data-toggle="flatpicker" placeholder="June 9, 2023">
                                                    
                                                                <div class="invalid-feedback">
                                                                 Please enter a Start Date.
                                                                </div>

                                                                @error('start_date')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Change Status</label>
                                                                <select name="status" class="form-control" id="">
                                                                    <option @if($user['status'] == 'active') selected @endif value="active">Active</option>
                                                                    <option @if($user['status'] == 'inactive') selected @endif value="inactive">Inactive</option>
                                                                </select>
                                                                

                                                            </div>
                                                        </div>

                                                    </div>

                                                <div class="my-3 mt-xl-0">
                                                <label for="projectname" class="mb-0 form-label">Photo</label>

                                                     <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>
                                                        <label class="image-input">
                                                            <input type="file" name="file" accept="image/png,image/jpeg" max-size="10000000">
                                                            <input type="hidden" name="">
                                                            <img src="{{ asset('storage/uploads/user_' . $user->user_id . '/' . $user->photo) }}" alt="">
                                                        </label>

                                                        @error('file')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    <!-- end file preview template -->
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

$(document).ready(function(){
        $('input[name="role"]').change(function(){
            var selectedRole = $('input[name="role"]:checked').val();
            if(selectedRole === 'manager') {                
             $('#selectRole').removeClass('d-none')
            } else if(selectedRole === 'agent') {                
                $('#selectRole').addClass('d-none')
            }
        });
    });

function ImageInput(element){
  // Variables
  var $wrapper = element;
  var $file = $wrapper.querySelector('input[type=file]');
  var $input = $wrapper.querySelector('input[type=hidden]');
  var $img = $wrapper.querySelector('img');
  var maxSize = Number($file.getAttribute('max-size'));
  var types = $file.accept.split(',');
  
  var api = {
    onInvalid: onInvalid,
    onChanged: onChanged,
  };
  
  // Methods
  function fileHandler(e) {
      var file = $file.files.length && $file.files[0];
      
      if(!file) return;
    
      var errors = checkValidity(file); 
    
      if(errors) {
        api.onInvalid(errors);
        $file.value = null;
        return;
      }
    
      api.onChanged(file, update, $wrapper)
  }
     
  function humanizeFormat(string) {
    return string.replace(/.*?\//, '');
  }
  
  function checkValidity(file) {
    var errors = [];
    
    types.includes(file.type) || errors.push('Format file harus: ' + types.map(humanizeFormat).join(', '));
    file.size < maxSize || errors.push('Ukuran file maksimal ' + maxSize/1000000 + 'MB');
    
    return errors.length ? errors : false;
  }
  
  function getFileData(file, callback) {
    var reader  = new FileReader();
    
    reader.addEventListener("load", function () {
      callback(reader.result);
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }
  
  function update(data) {
    $img.src = data;
    $input.value = data;
  }
  
  function onInvalid(errors) {
    alert(errors.join('. '));
  }

  function onChanged(file, update, $wrapper) {
    console.log('.onChanged called');
    getFileData(file, update);
  }
  
  // Init
  $file.addEventListener('change', fileHandler);
  
  return api;
};

document.querySelectorAll('.image-input').forEach(_ => {
  var imageInput = new ImageInput(_);
  _.addEventListener("click",(e)=>{
     if(e.target.classList.contains('image-remove')) {
       _.remove()
     }
   });
  
  
  
  if(_.classList.contains('withAjax')) {
    imageInput.onChanged = customOnChanged;
    
  }
  
  function customOnChanged(file, update, $el) {  
    if(!$el.nextElementSibling){
      var $remove = document.createElement('button');
      $remove.className = "image-remove";

      var $new = $el.cloneNode(true);
      $new.querySelector('input[type=hidden]').value = "";
      $new.querySelector('input[type=file]').value = "";
      $new.querySelector('img').src = "";

      $el.parentElement.append($new);
      $el.append($remove);

      var imageInput = new ImageInput($new);
      imageInput.onChanged = customOnChanged;  
    }

    $el.classList.add('isUploading');
    setTimeout(function() {
      update('https://placekitten.com/200/300');
      $el.classList.remove("isUploading");
    }, 3000);

  };
  
});
 </script>

<script>
    function redirectToRoute() {
        window.location.href = "{{ route('manager.agent.list') }}";
    }
</script>

 @endpush