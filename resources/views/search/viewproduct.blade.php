@extends('layouts.view')
<link href="{{asset('mdb/css/custom.css')}}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="  crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

<style>
    .zoom{
        font-size: 155%
        
    }
</style>


<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="mb-5 zoom">
    @include('layouts.header')
</div>
@section('content')
    
    <div class="container zoom">
        
        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">



                    <div class="panel-body">
                        {!! Form::open(['action' => ['UserController@ratesellers', $item->id], 'method'=>'POST']) !!}

                            {{ csrf_field() }}

                            <div class="card">

                                <div class="container-fliud">

                                    <div class="wrapper row ">

                                        <div class="preview col-md-6">



                                            <div class="preview-pic tab-content">

                                                <div class="tab-pane active" id="pic-1"><img src="{{asset('Products/'.$item->productImage)}}" /></div>

                                            </div>


                                        </div>

                                        <div class="details col-md-6 pt-5">

                                            <h3 class="product-title">{{$item->productName}}</h3>

                                            <div class="rating">

                                                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $seller->userAverageRating }}" data-size="xs">

                                                <input type="hidden" name="id" required="" value="{{ $seller->id }}">

                                                <span class="review-no">422 reviews</span>

                                                <input type="hidden" name="productid" required="" value="{{ $item->id }}">

                                                <br/>

                                                <button class="btn btn-success">Submit Review</button>

                                            </div>

                                            <p class="product-description">{{$item->productDescription}}</p>

                                            <h4 class="price">current price: <span> Rs {{$item->productPrice}}.00</span></h4>

                                            <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>

                                            

                                            <div class="action zoom">

                                            <button class="add-to-cart btn btn-default" type="button"><a href="{{url('products/searchproduct/buy/'.$item->id)}}">Buy </a></button>

                                                <button class="like btn btn-default" type="button"><a href="{{url('products/searchproduct/fav/'.$item->id)}}"><span class="fa fa-heart"></span></a></button>
                                                {{-- <a class="btn btn-primary" href="{{url('/products/searchproduct/'.$item->id.'/chat/'.Auth::user()->id)}}"> Chat With Seller</a> --}}
                                                    
                                            </div>
                                            
                                            <div class="mt-2 zoom">
                                                @include('inc.errormessage')
                                            </div>

                                        </div>
                                        @include('chat.chat')
                                        
                                        

                                    </div>


                                </div>

                            </div>

                        {!! Form::close() !!}
                        
                            
                        

                    </div>

                </div>

            </div>

        </div>

    </div>



    <script type="text/javascript">

        $("#input-id").rating();

    </script>
    <div class="zoom">
        @include('layouts.footer')
    </div>

