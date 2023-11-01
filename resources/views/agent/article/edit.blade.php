@extends('layouts.agent.index')
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
                                            <li class="breadcrumb-item active">Edit News Article</li>
                                        </ol>
                                    </div>
                                   
                                    <h4 class="page-title">Edit News Article</h4>
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
                                                            Edit News Article
                                                        </h5> 
                                                    </div>
                                                   
                                                </div>
                                            </div>    
                                        </div>

                                   

                                        <div class="row mt-3">
                                            <div class="col-xl-6">
                                                <form id="myForm" class="needs-validation" method="post" enctype="multipart/form-data" novalidate action="{{ route('agent.article.update',$article->id) }}" >
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="Title" class="form-label">Title</label>
                                                        <input type="text" value="{{$article->title}}" required  name="title" class="form-control" placeholder="News Title" >
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Select Category" class="form-label">Select Category</label>

                                                        <select name="category_id" id="" required class="form-control">
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $category )
                                                            <option @if($article->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>                                                                
                                                            @endforeach
                                                        </select>
                                                    </div>                                                   
                                                   
                                                    <div class="mb-3">
                                                        <label class="form-label">Popular New</label> <br/>
                                                        <div class="form-check form-check-inline">
                                                            <input  value="1" type="radio" @if($article->popular == '1') checked @endif id="customRadio1"  name="popular" class="form-check-input">
                                                            <label class="form-check-label" for="customRadio1">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input  value="0" type="radio" @if($article->popular == '0') checked @endif id="customRadio2"  name="popular" class="form-check-input">
                                                            <label class="form-check-label" for="customRadio2"  >No</label>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Top New</label> <br/>
                                                        <div class="form-check form-check-inline">
                                                            <input  value="1" type="radio" @if($article->top_new == '1') checked @endif id="customRadio1"  name="top_new" class="form-check-input">
                                                            <label class="form-check-label" for="customRadio1">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input  value="0" type="radio" @if($article->top_new == '0') checked @endif id="customRadio2"   name="top_new" class="form-check-input">
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
                                                            <input  value="{{$article->publish_date}}" required type="date" class="form-control" name="publish_date"  data-toggle="flatpicker" placeholder="June 9, 2023">
                                                
                                                            <div class="invalid-feedback">
                                                             Please enter a Publish Date.
                                                            </div>

                                                            @error('publish_date')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Publish Status</label>
                                                            {{-- <p class="text-muted font-14">You can set time for publish.</p>s --}}

                                                           <select name="publish" id="" class="form-control">
                                                               <option value="1" @if($article->publish == '1')selected @endif>Publish</option>
                                                               <option value="0" @if($article->publish == '0')selected @endif >Unpublish</option>
                                                           </select>
                                                            <div class="invalid-feedback">
                                                             Please enter a Publish Date.
                                                            </div>

                                                            @error('publish_date')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                </div>

                                            <div class="my-3 mt-xl-0">
                                            <label for="projectname" class="mb-0 form-label">Article Main Image</label>

                                                 <p class="text-muted font-14">Recommended Image size 800x400 (px).</p>
                                                    <label class="image-input">
                                                        <input type="file" name="file" id="file-upload" accept="image/png,image/jpeg" max-size="10000000">
                                                        <input type="hidden" name="">
                                                        <img src="{{ asset('storage/uploads/article_' . $article->user_id . '/' . $article->image) }}" alt="">
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

                                                    @php $codedata= html_entity_decode($article->content); @endphp
                                                    <label for="project-overview" class="form-label">Article Content</label>
                                                    <textarea  value="{{old('editor1')}}" class="form-control" name="editor1" id="project-overview"  rows="5" placeholder="Article Content">{!! $codedata !!}</textarea>
                                              
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
 <script>



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
        window.location.href = "{{ route('agent.article.list') }}";
    }
</script>

 @endpush