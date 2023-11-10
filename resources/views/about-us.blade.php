@extends('layouts.front.main')
<style>
      .padded-image {
      width: 800px;
      height: 400px;
      padding-left: 20%;
      margin-bottom:80px;
    }
    .responsive-image {
        max-width: 100%;
        height: auto;
        }
        body{
            background:white !important;
        }
  </style>
@section('main-content')
            <main>
               <div>
                  <div class="row container justify-content-between align-items-center">
                     
                      <div class="col-md-12">
                        <img src="{{ asset('assets/images/aboutus.png')}}" class="padded-image responsive-image" alt="">
                     </div>
                     <div class="col-md-12">
                        <h3><strong>About Us</strong></h3>
                        <p>Now the question is: why would you want to share all this information and make it appealing?
                           The answer is simple: you want to tell your audience who you are, show them what you are good at,
                           and tell them you are worthy of their trust. Think for a moment: would you rather purchase from
                           a business you know nothing about, or would you go for somebody with a friendly face shared on their
                           About page and a story that you find exciting? The latter one, right? A great About Us page not only
                           portrays your story, qualities and provides an insight on how your business started, but it also helps you sell.
                           When visitors become familiar with your story and connect with it, theyre probably going to purchase from you.
                           A well-planned About Us page can do this!</p>
                           <p>Nevertheless, creating an About Us page that precisely represents your organization can perhaps feel more challenging 
                              than one might expect. You can consider several things you want your visitors to know, from your history to your 
                              achievements to your business values, yet filling all of that information on a single page can be overwhelming for
                              you as well as your visitors. So, how can you design a compelling About Us page by following the About Us page best
                              practices that will show your visitors who you are and what you do? Indeed,
                              theres no one-size-fits-all solution; however,
                              theres no harm in looking at what other successful organizations are doing. 
                              So, have a look at these About Us page examples of organizations that got it </p><br><br>
                     </div>
                  </div>
               </div>
           </main> 

@endsection