@extends('layouts.profilelayout')

@section('content')
<main class="pt-5 px-1">
    <div class="card mb-4">
        <div class="card-body light-blue lighten-1">
            <h3 class='white-text text-center'>Your Orders</h3>
        </div>
    </div>
    <div class="card">
        <div class="card-body px-5 py-3 ">
            @if(count($orders)>0)
                @foreach ($orders as $orders)
                    <div class="row border my-3 px-3">
                        <div class="col-md-2">
                            <img src= "{{asset('Products/'.$orders->productType->productImage)}}" style='width:90%; height:90%;' class='px-1 py-1' alt="sample photo">    
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <h5 class="text-capitalize  mx-1 px-1 py-4">{{$orders->productType->productName}} {{$orders->productType->category}}</h5>
                            </div>
                            <div class="row">
                                <p>{{$orders->productType->productDescription}}</p>
                            </div>
                            <div class="row">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row"><p class="text-capitalize  mx-1 px-4 py-4">{{$orders->productType->location}}</p></div>
                            <div class="row px-4">
                                <p></i> Rs. {{$orders->productType->productPrice}}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row pt-5 mt-3">
                                <div class="col-md-6">
                               <a href="{{url('user/'.Auth::user()->id.'/vieworders/'.$orders->id)}}">
                                    <h1><i class=" aicon fa fa-check" aria-hidden="true"></i></h1>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{url('admin/'.Auth::user()->id.'/rejectproduct/'.$orders->productType->id)}}">
                                        <h1><i class="aicon fa fa-window-close" aria-hidden="true"></i></h1>
                                    </a>  
                                </div>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</main>
        

@endsection