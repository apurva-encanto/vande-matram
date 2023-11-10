@extends('layouts.front.main')
  <style>
      .input-border{
          border: 2px solid black !important;
      }
      .padded-image {
         margin-top: 200px;
      }
      body{
          background:white !important;
      }
      label{
          font-weight:600;
      }
  </style>
@section('main-content')
            <main class="">
                
              <div class="row">
                     <div class="col-md-10 ">
                        <div class="card border-0"><br>
                           
                           <div class="card-body">
                              <h4 class="card-title"><strong>Be available</strong></h4>
                           <h4 class="card-title">Our friendly team would love to hear from you</h4><br>
                              <form action="file:///C:/Users/patel/Downloads/vande-html/categories.html">
                                 <div class="form-group">
                                    <label class="mb-2" for="pnumber">Phone number</label>
                                    <input type="text" id="PhoneNumber" name="PhoneNumber" class="form-control input-border" placeholder="Enter your phone number"><br>
                                    <label class="mb-2" for="pnumber">Mobile</label>
                                    <input type="text" id="mobile" name="mobile" class="form-control input-border" placeholder="Enter your mobile number"><br>
                                    <label class="mb-2" for="pnumber">Fax</label>
                                    <input type="text" id="fax" name="fax" class="form-control input-border" placeholder="Enter your fax"><br>
                                    <label class="mb-2" for="pnumber">Email</label>
                                    <input type="text" id="email" name="email" class="form-control input-border" placeholder="Enter your email"><br>
                                    <label class="mb-2" for="address">Address</label><br>
                                    <textarea id="address" name="address" placeholder="Enter your address" class="form-control input-border"></textarea><br>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <img src="{{ asset('assets/images/contact-us.png')}}" height="40%" class="padded-image" alt="">
                     </div>
              </div>
               
           </main>

@endsection