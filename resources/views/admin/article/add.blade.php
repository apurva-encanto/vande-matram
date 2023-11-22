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
                                            <li class="breadcrumb-item active">Add New Article</li>
                                        </ol>
                                    </div>

                                    <h4 class="page-title">Add New Article</h4>
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
                                                            Add New Article
                                                        </h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>



                                        <div class="row mt-3">
                                            <div class="col-xl-6">
                                                <form id="addArticle" method="post" enctype="multipart/form-data"  action="{{ route('admin.article.create')}}" >
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="Title" class="form-label">Title <span class="text-danger">*</span></label>
                                                        <input type="text"  value="{{old('title')}}" required  name="title" class="form-control" placeholder="News Title" >
                                                            <div class="invalid-feedback">
                                                              Please enter a valid Title.
                                                            </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Select Category" class="form-label">Select Category <span class="text-danger">*</span></label>

                                                        <select name="category_id" id="category_id" required class="form-control">
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $category )
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>

                                                           <div class="invalid-feedback">
                                                              Please select a Category.
                                                            </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">City <span class="text-danger">*</span></label> <br/>
                                                        <div class="form-group">
                                                            <input  value="" type="text"  pattern="[A-Za-z ]+"  placeholder="Enter City" id=""   name="city" class="form-control">
                                                          <div class="invalid-feedback">
                                                              Please enter a City.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Popular New</label> <br/>
                                                        <div class="form-check form-check-inline">
                                                            <input  value="1" @if(old('popular') == 1) checked @endif  type="radio" id="customRadio1"  name="popular" class="form-check-input">
                                                            <label class="form-check-label" for="customRadio1">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input  value="0" @if(old('popular') == 0) checked @endif  type="radio" id="customRadio2" checked name="popular" class="form-check-input">
                                                            <label class="form-check-label" for="customRadio2"  >No</label>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Top New</label> <br/>
                                                        <div class="form-check form-check-inline">
                                                            <input  value="1" @if(old('top_new') == 1) checked @endif type="radio" id="customRadio1"  name="top_new" class="form-check-input">
                                                            <label class="form-check-label" for="customRadio1">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input  value="0" type="radio" id="customRadio2" @if(old('top_new') == 0) checked @endif checked  name="top_new" class="form-check-input">
                                                            <label class="form-check-label" for="customRadio2" >No</label>
                                                        </div>
                                                    </div>

                                            </div> <!-- end col-->

                                            <div class="col-xl-6">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <!-- Date View -->
                                                        <div class="mb-3">
                                                            <label class="form-label">Publish Date</label>
                                                            <input  value="{{date('Y-m-d')}}" required type="date" class="form-control" name="publish_date"  data-toggle="flatpicker" placeholder="June 9, 2023">

                                                            <div class="invalid-feedback">
                                                             Please enter a Publish Date.
                                                            </div>

                                                            @error('publish_date')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Publish Status</label>
                                                            <p class="text-muted font-14">You can set time for publish.</p>

                                                           <select name="publish" id="" class="form-control">
                                                               <option @if(old('publish') == 1) selected @endif value="1">Publish</option>
                                                               <option @if(old('publish') == 0) selected @endif value="0">Unpublish</option>
                                                           </select>
                                                            <div class="invalid-feedback">
                                                             Please enter a Publish Date.
                                                            </div>

                                                            @error('publish_date')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        
                                                                
                                                        <div class="mb-3 d-none" id="video_url">
                                                            <label for="Video Url" class="form-label">Video Url</label>
                                                                <input type="text"  value="{{old('videos')}}"    name="videos" class="form-control " placeholder="News Video Url" >
                                                                    <div class="invalid-feedback">
                                                                     Please enter a valid Url.
                                                                    </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            <div class="my-3 mt-xl-0">
                                            <label for="projectname" class="mb-0 form-label">Article Main Image <span class="text-danger">*</span></label>
<br>
                                                    <label class="image-input">
                                                        <input type="file" name="file" id="file-upload" accept="image/*"  max-size="10000000">
                                                        <input type="hidden" name="">
                                                        <img src="" alt="">
                                                    </label>

                                                    <p class="file-error d-none text-danger" >Please select a file before submitting the form.</p>

                                                    @error('file')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                <!-- end file preview template -->
                                               </div>



                                        </div> <!-- end col-->
                                            <div class="col-xl-12">
                                                <div class="mb-3">
                                                    <label for="project-overview" class="form-label">Article Content <span class="text-danger">*</span></label>
                                                            @error('editor1')
                                                                <div class="text-danger">Article Content is Required</div>
                                                            @enderror
                                                            
                                                    <textarea required value="{{old('editor1')}}" class="form-control" name="editor1" id="project-overview"  rows="5" placeholder="Article Content"></textarea>

                                                            <div class="invalid-feedback">
                                                             Please enter a Article Content.
                                                            </div>
                                                </div>
                                            </div>

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
     
        $("#category_id").on("change", function() {
      var selectedValue = $(this).val();
      if(selectedValue == 4)
      {
           $("#video_url").removeClass("d-none")
          $("#video_url").prop("required", true);
      }else{
           $("#video_url").addClass("d-none")
           $("#video_url").prop("required", false);
      }
    });
     
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
                    title:  {
                    required: true,
                        maxWords: 150 , 
                    }, 
                    editor1:"required",
                    category_id: "required"
                 
                },
                messages: {
                    title: {
                        required: "Title is required",
                        maxWords: "Please enter no more than 150 words",
                         minWords: "Please enter at least 5 words"
                    },                   
                
                  city: "Please enter your city",
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
        if (fileUpload.files.length === 0) {
            // Prevent the form from being submitted
            event.preventDefault();

            $('.file-error').removeClass('d-none')
        }
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
        window.location.href = "{{ route('admin.article.list') }}";
    }
</script>

 @endpush
