@extends('layouts.profilelayout')

@section('content')
<section class="text-center">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center my-5">Delete Products</h2>
        <!-- Section description -->
        <p class="grey-text text-center w-responsive mx-auto mb-5">Delete your unapropriate products from our web site. You have to remove products that are currently unavilable. Deleting product will reduce unwanted orders from customers</p>
        @include('inc.errormessage')
        
        <div class="row">
        @if (count($products)>0)

             @foreach ($products as $product) 
            
             <div class="col-md-4 mb-2">
                <div class="card">
              <!-- Card -->
              <div class="card card-cascade narrower card-ecommerce" style="min-height:50px;">
                <!-- Card image -->
                <div class="view view-cascade overlay">
                  <img src= "{{asset('Products/'.$product->productImage)}}" class="card-img-top" alt="sample photo" >
                  <a>
                    <div class="mask rgba-white-slight"></div>
                  </a>
                </div>
                <!-- Card image -->
                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">
                  <!-- Category & Title -->
                  
                  <h4 class="card-title my-4">
                    <strong>
                    <a href="">{{$product->productName}}</a>
                    </strong>
                  </h4>
                  <!-- Description -->
                  <p class="card-text">{{$product->productDescription}}
                  </p>
                  <!-- Card footer -->
                  <div class="card-footer px-1">
                    <span class="float-left">Rs. {{$product->productPrice}}</span>
                    <span class="float-right">
                      {!!Form::open(['action'=>['ProductController@destroy', $product->id], 'method'=>'post', 'class'=>'pull-right']) !!}
                        {{Form::hidden('_method','DELETE')}}
                        <div class="row">
                         
                          <div class="col-sm-5">
                        {{Form::Submit('Delete',['class'=>'btn btn-danger '])}}
                          </div>
                      </div>
                      {!!Form::close()!!}
                    </span>
                  </div>
                </div>
                <!-- Card content -->
              </div>
              <!-- Card -->
            </div></div>
            <? $i=$i+1; ?>
            @if($i==3)
              </div>
              <div class="row">
              <?php $i=0; ?>  
            @endif

            @endforeach
            
        @else 
            <h3 class="alert red" style="color:white;">No available items</h3>          
        @endif

@endsection