@extends('layouts.app')
@include('layouts.header')
@section('content')

  <div class="view jarallax intro" data-jarallx='{"speed":0.5}' style="background-image: url('{{asset("images/main-cover.jpg")}}');  background-repeat: no-repeat; background-size: cover; background-position: center center; height:100% " >
        <div class="mask rgba-black-strong d-flex justyfy-content-center align-items-center">
            <div class="container">
                <div class="row ">
                    <div class="col-md-12 white-text text-center">
                        <h1 class="display-3 mb-0 pt-md-5 pt-5 white-text font-weight-bold wow">Ruk
                            <a class="heartBeat white-text font-weight-bold">.LK</a>
                        </h1>
                        <h5 class="text-uppercase pt-md-1 pt-sm-1 pt-1 pb-md-1 pb-sm-3 pb-5 white-text subtext-header mt-2 mb-4 wow fadeInDown" data-wow-delay="0.3s">Make a green world for everyone</h5>
                    
                            <!-- Searchbar -->
                            <form action="/products/searchproduct">
                                    <div class="active-white-3 active-white-4 mb-4">
                                        <input class="form-control" name="search" type="text" placeholder="Search" aria-label="Search">
                                        <input hidden name="type" value="all">
                                    </div>
                                    <button type="submit" class="btn btn-outline-white waves-effect">Search</button>
                            </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div> 

   <section class="text-center my-5">
       <h2 class="h1-responsive green-text font-weight my-2">What is Ruk.LK...?</h2>
       <p class="lead grey-text w-responsive mx-auto mb-5">Ruk.lk is a web-based application which involve for increase the seeds and plants in Sri Lanka as well as get commercial benefits to users. Ruk.lk is a web-based platform to meet sellers who sell the trees and buyers who like to buy trees. In the other side it’s a platform for volunteers to meet organizations which plants trees in island wide and give support to the organization.</p>
       <div class="row">
           <div class="col-md-3">
                <i class="fa fa-money fa-3x green-text" aria-hidden="true"></i>
                <h5 class="font-weight-bold my-4">Buyer</h5>
                <p class="grey-text mb-md-0 mb-5">Are you interst in buying plants ? So here is the chance. Come and Join with us</p>
           </div>
           <div class="col-md-3">
                <i class="fa fa-tree fa-3x green-text" aria-hidden="true"></i>
                <h5 class="font-weight-bold my-4">Seller</h5>
                <p class="grey-text mb-md-0 mb-5">Are you interst in selling plants ? So here is the chance. Come and Join with us</p>
           </div>
           <div class="col-md-3">
                <i class="fa fa-user-secret fa-3x green-text" aria-hidden="true"></i>
                <h5 class="font-weight-bold my-4">Volunteer</h5>
                <p class="grey-text mb-md-0 mb-5">Are you interst in Volunteering  ? So here is the chance. Come and Join with us. Find volunteering orgnaizations for donations</p>
           </div>
           <div class="col-md-3">
                <i class="fa fa-building-o fa-3x green-text" aria-hidden="true"></i>
                <h5 class="font-weight-bold my-4">Organization</h5>
                <p class="grey-text mb-md-0 mb-5">Are you interst in Volunteering ? So here is the chance. Come and Join with us. Find volunteers to increase your donations</p>
           </div>
       </div>
   </section>

   <hr>
   <section class="text-center my-5 intro">
        <h2 class="h1-responsive green-text font-weight my-2">RukWiki</h2>
        <div class="row">
            <div class="col-lg-5">
               <img class="img-fluid" src="{{asset('images/RukWiki Ui.png')}}">
            </div>
            <div class="col-lg-5 my-5">
                <p>Ruk wiki is a web service which provide knowledge to the people who are intersted in Agricultue staff. It provides informations related planting trees, informations about ayurvedic plants, tips of planting trees.. etc.  </p>
                <p>You can get informations according to different types of categrories such as Tips, Herbal plants.. etc</p>
            </div>
        </div>

                    
            <div class="view jarallax intro" data-jarallx='{"speed":0.5}' style="background-image: url('{{asset("images/main-cover.jpg")}}');  background-repeat: no-repeat; background-size: cover; background-position: center center; height:50% " >
                <div class="mask rgba-black-strong d-flex justyfy-content-center align-items-center">
                    <div class="container">
                        <div class="row container">
                            <h3 class="white-text text-center">"The care of the Earth is our most ancient and most worthy, and after all, our most pleasing responsibility. ” </h3><br>
                        </div>
                    </div>
                </div>
            </div>

            <section class="text-center my-5 intro">
            <h2 class="h1-responsive green-text font-weight my-2">Events</h2>
            
            @if(count($event)>0)
                <div class="row d-flex justify-content-center">
                @foreach($event as $events)
                    <div class="col-md-3 col-sm-3 mx-3">
                        <img src= "{{asset('Events/'.$events->adimage)}}" class="w-100 px-3 py-3  img-thumbnail d-flex justify-content-center">
                    </div>
                @endforeach
                <div class="row d-flex justify-content-center my-2">
                    {{$event->links()}}
                </div>
                </div>
            @else
            @endif
            <hr>
            <div>
                <a href="{{url('/event')}}" class="btn light-green accent-4">Register Event</a>
            </div>
            
        


    </section>


    
    @include('layouts.footer')
@endsection
