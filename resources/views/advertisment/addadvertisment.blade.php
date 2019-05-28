@extends('layouts.app')
<div class="mb-5">
    @include('layouts.header')
</div>
@section('content')

<div class="row mx-0">
    <div class="col-md-4">
        <div style="padding-top: 50px; ">
        
            <div class=" ml-5 mt-3">
                <div class="text-center">
                    <h3 class="dark-grey-text mb-0 pt-md-4 pb-2"><strong>Register Your Advertisment</strong></h3>
                </div>
                @include('inc.errormessage')
                {!! Form::open(['action' => ['AdvertismentController@store'], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
        
                <div class="md-form ">
                    
                    {{Form::text('productName','',['class'=>'col-md-12 col-form-label text-md form-control', 'placeholder'=>'Product Name'])}}
                    @if ($errors->has('productName'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('productName') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="md-form mt-5">
                    
                    {{Form::text('ownerName','',['class'=>'col-md-12 col-form-label text-md form-control','placeholder'=>'Owner Name'])}}
                    @if ($errors->has('ownerName'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ownerName') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="md-form mt-5">
                    
                    {{Form::text('ownerMobileno','',['class'=>'col-md-12 col-form-label text-md form-control','placeholder'=>'Mobile Number'])}}
                    @if ($errors->has('ownerMobileno'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ownerMobileno') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    {{Form::label('addImage',"image",['class'=>'col-form-label text-md-right'])}}
                    {{Form::file('addImage')}}
                    @if ($errors->has('addImage'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('addImage') }}</strong>
                        </span>
                    @endif
                </div>

                {{Form::submit('Add Advertisment',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-md-8 px-0">
        <div class="view" style="background-image: url('{{asset("images/back-login.jpg")}}');  background-repeat: no-repeat; background-size: cover; background-position: center center; height:100% ; width:100%">                    
        <div class="mask rgba-black-light d-flex">
        </div>
             
    </div>
</div>


