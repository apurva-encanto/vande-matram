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


                                            <li class="breadcrumb-item"><a href="{{route('manager.home')}}"> Dashoard</a></li>
                                            <li class="breadcrumb-item active">My Account Settings</li>
                                        </ol>
                                    </div>

                                    <h4 class="page-title">My Account Settings</h4>
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
                                                            My Account Settings
                                                        </h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mt-3">
                                            <div class="col-xl-6">
                                                <form id="addArticle" method="post" enctype="multipart/form-data"  action="{{ route('manager.account.edit')}}" >
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="Name" class="form-label">Name</label>
                                                        <input type="text" value="{{auth()->user()->name}}" required  name="name" class="form-control" placeholder="Manager Name" >
                                                           <div class="invalid-feedback">
                                                            Please enter a valid Name.
                                                            </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Email" class="form-label">Email Address</label>
                                                        <input type="email" value="{{auth()->user()->email}}" required  name="email" class="form-control" placeholder="Manager Email Address" >
                                                            @error('email')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror

                                                            <div class="invalid-feedback">
                                                            Please enter a valid Email Address.
                                                            </div>

                                                    </div>
                                                   <div class="mb-3">
                                                        <label for="Password" class="form-label">Password</label>
                                                        <input type="password" value="{{old('password')}}"   name="password" class="form-control" placeholder="Manager Password" >
                                                    </div>


                                            </div> <!-- end col-->

                                            <div class="col-xl-6">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <!-- Date View -->
                                                    <div class="mb-3">
                                                        <label for="Phone" class="form-label">Phone</label>
                                                        <input type="number" value="{{auth()->user()->phone}}" required  name="phone" class="form-control" placeholder="Phone Number" >
                                                           @error('phone')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror

                                                            <div class="invalid-feedback">
                                                            Please enter a valid Phone Number.
                                                            </div>
                                                    </div>
                                                    <div class="my-3 mt-xl-0">
                                                <label for="projectname" class="mb-0 form-label">Manager Image</label>
                                                <br>

                                                    <label class="image-input">
                                                        <input type="file" name="file" id="file-upload" accept="image/*"  max-size="10000000">
                                                        <input type="hidden" name="">
                                                        <img  src="@if(!empty(auth()->user()->image)){{ asset('uploads/user_' . auth()->user()->id . '/' . auth()->user()->image) }}@endif"   alt="">
                                                    </label>

                                                    <p class="file-error d-none text-danger" >Please select a file before submitting the form.</p>

                                                    @error('file')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                <!-- end file preview template -->
                                               </div>
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
 <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
 <script>
 $(document).ready(function($) {
     
        // Custom validation method for max words
    $.validator.addMethod("maxWords", function(value, element, params) {
        return this.optional(element) || value.match(/\b\w+\b/g).length <= params;
    }, "Please enter no more than {0} words.");
    
        // Custom validation method for minimum words
    $.validator.addMethod("minWords", function(value, element, params) {
        return this.optional(element) || value.match(/\b\w+\b/g).length >= params;
    }, "Please enter at least {0} words.");
    
        
				$("#addArticle").validate({
                rules: {
                    first_name:  {
                    required: true,
                        maxWords: 5 , // Custom rule to limit the number of words
                         minWords: 1 
                    }, 
                    last_name:  {
                    required: true,
                        maxWords: 5 , // Custom rule to limit the number of words
                         minWords: 1 
                    }, 
                     password: {
                        minlength: 6
                    },
                     email:{
                         required: true,
                          email: true,
                    },
                    
                    city: "required",
                    editor1:"required",
                    area:"required",
                    category_id: "required",
                    phone:{
                          required: true,
                          number: true
                    }
                 
                },
                messages: {
                    first_name: {
                        required: "First Name is required",
                        maxWords: "Please enter no more than 150 words",
                         minWords: "Please enter at least 5 words"
                    },     
                    
                     last_name: {
                        required: "Last Name is required",
                        maxWords: "Please enter no more than 150 words",
                         minWords: "Please enter at least 5 words"
                    },   
                    
                     password: {
                        minlength: "Your password must be at least 6 characters long"
                    },
                    phone:{
                          required: "Please enter a numeric value",
                          number: "Please enter a valid number"
                    },
                    
                
                  city: "Please enter your city",
                  area: "Please enter your area",
                  category_id: "Please select Category"
                },
                 errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.form-group') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
         },
                submitHandler: function(form) {
                    form.submit();
                }
                
            });
    });
 </script>
 
 <script>


    document.getElementById('addArticle').addEventListener('submit', function(event) {
        var fileUpload = document.getElementById('file-upload');

        // Check if the file input is empty
        // if (fileUpload.files.length === 0) {
        //     // Prevent the form from being submitted
        //     event.preventDefault();

        //     $('.file-error').removeClass('d-none')
        // }
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

    // types.includes(file.type) || errors.push('Format file harus: ' + types.map(humanizeFormat).join(', '));
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
  $('.file-error').addClass('d-none')

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
    CKEDITOR.replace('editor1', {
    });
    function redirectToRoute() {
        window.location.href = "{{ route('manager.home') }}";
    }
</script>

 @endpush
