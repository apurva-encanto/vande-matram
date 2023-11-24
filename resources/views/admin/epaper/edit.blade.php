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
                                            <li class="breadcrumb-item active">Edit E-paper</li>
                                        </ol>
                                    </div>

                                    <h4 class="page-title">Edit New E-Paper</h4>
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
                                                            Edit New E-Paper
                                                        </h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-xl-6">
                                                <form id="addArticle"  method="post" enctype="multipart/form-data"  action="{{ route('admin.epaper.create')}}" >
                                                    @csrf
                                                    <div class="mb-3 ">
                                                        <label for="E-Paper Date" class="form-label">E-Paper Date <span class="text-danger"> *</span></label>
                                                        <input type="date"  value="{{$list->date}}"  name="epaper_date" class="form-control " required placeholder="E-Paper Date" required>
                                                            @error('epaper_date')
                                                              <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                                <div class="invalid-feedback">
                                                                 Please enter a E-Paper Date.
                                                                </div>
                                                    </div>


                                            </div> <!-- end col-->
                                               <div class="col-xl-6">

                                                    <div class="mb-3">
                                                        <label for="E-Paper Name" class="form-label">E-Paper City <span class="text-danger"> *</span></label>
                                                        <select name="epaper_city" required class="form-control" id="">
                                                            <option value="" disabled selected >Select City</option>
                                                            <option @if($list->place=='indore') selected @endif value="indore" >Indore</option>
                                                            <option @if($list->place=='bhopal') selected @endif value="bhopal" >Bhopal</option>
                                                            <option @if($list->place=='dewas') selected @endif value="dewas" >Dewas</option>
                                                            <option  @if($list->place=='ujjain') selected @endif value="ujjain" >Ujjain</option>

                                                        </select>
                                                       @error('epaper_city')
                                                        <div class="text-danger">{{ $message }}</div>
                                                       @enderror
                                                    </div>


                                            </div> <!-- end col-->
                                               <div class="col-xl-12">

                                                    <div class="mb-3">
                                                        <label for="E-Paper Name" class="form-label">E-Paper Images <span class="text-danger"> *</span></label>
                                                        <input class="mx-4" type="file" id="files" accept="image/*" required name="files[]" multiple />
                                                       @error('files')
                                                        <div class="text-danger">{{ $message }}</div>
                                                       @enderror

                                                    </div>
                                                    <div class="row" id="image-preview mb-2">
                                                        @foreach ($eimages as $eimage)
                                                        <div class="col-md-2 pip">
                                                            <img class="imageThumb" src="{{ asset('uploads/epaper/'. $eimage->image) }}" title=""/>
                                                            <br/><a href="{{ route('admin.epaper.edit',$eimage->id) }}" class="remove text-white bg-danger">x</a>
                                                            </div>

                                                        @endforeach

                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="E-Paper Name" class="form-label">E-Paper Download <span class="text-danger"> *</span></label>
                                                        <input type="radio" name="is_download" value="1" @if($list->place==1) checked @endif id=""> Yes
                                                        <input type="radio" name="is_download" value="0" @if($list->place==0) checked @endif  id=""> No

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
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
 <script>

	$("#addArticle").validate({
                rules: {
                    epaper_date:  {
                    required: true,
                        date: true
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


 $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<div class=\"col-md-2 pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove text-white bg-danger\">x</span>" +
            "</div>").appendTo("#image-preview");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });

          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/

        });
        fileReader.readAsDataURL(f);
      }
      console.log(files);
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});

 </script>

<script>
    function redirectToRoute() {
        window.location.href = "{{ route('admin.epaper.list') }}";
    }
</script>

 @endpush
