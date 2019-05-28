@extends('layouts.profilelayout')

@section('content')
<!-- Section: Products v.2 -->
<section class="">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center my-5">Your Favorite Products</h2>
        <!-- Section description -->
        <p class="grey-text text-center w-responsive mx-auto mb-5">These are your favourite products. Do you like to see again</p>
      
         @include('inc.errormessage')
       
        
        @if (count($fav)>0)

             @foreach ($fav as $fav) 
             
             <div class="px-2 favrow my-2">
               <div class="row">
                 <div class="col-md-11">
                 <p class="favrow-title my-1 "><a href="{{url('products/searchproduct/'.$fav->productId)}}">{{$fav->productType->productName}} </a></p>
                    <p class="favrow-description">{{$fav->productType->productDescription}}</p>
                 </div>
                 <div class="col-md-1">
                    <a href="{{url('user/'.Auth::user()->id.'/fav/'.$fav->productId)}}"><i class="fa fa-heart favcansel"></i></a>
                </div>

               </div>
             
             
             </div>
             
           
           

            @endforeach
            
        @else 
            <h3 class="alert red" style="color:white;">No available items</h3>          
        @endif

@endsection