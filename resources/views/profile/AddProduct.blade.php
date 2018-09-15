@extends('layouts.profilelayout')

@section('content')
<section class="text-center">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center my-5">Add Products</h2>
        <!-- Section description -->
        <p class="grey-text text-center w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur veniam.</p>
        @include('inc.errormessage')

        {!! Form::open(['action' => ['ProductController@store'], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
        
        <div class="form-group row">
            {{Form::label('productName',"Product name",['class'=>'col-md-4 col-form-label text-md-right'])}}
            {{Form::text('productName','',['class'=>'col-md-4 col-form-label text-md form-control'])}}
             @if ($errors->has('productName'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('productName') }}</strong>
                </span>
             @endif
        </div>

        <div class="form-group row">
                {{Form::label('category',"Product Category",['class'=>'col-md-4 col-form-label text-md-right'])}}
                {{Form::select('category', ['tree' => 'Tree','seed' => 'Seeds'],['class'=>'col-md-4 col-form-label text-md form-control'])}}
                 @if ($errors->has('productName'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('productName') }}</strong>
                    </span>
                 @endif
            </div>

        <div class="form-group row">
            {{Form::label('productDescription',"Product Description",['class'=>'col-md-4 col-form-label text-md-right'])}}
            {{Form::text('productDescription','',['class'=>'col-md-4 col-form-label text-md form-control'])}}
            @if ($errors->has('productDescription'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('productDescription') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
                {{Form::label('productPrice',"Product Price",['class'=>'col-md-4 col-form-label text-md-right'])}}
                {{Form::text('productPrice','',['class'=>'col-md-4 col-form-label text-md form-control'])}}
                @if ($errors->has('productPrice'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('productPrice') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row">
                    {{Form::label('location',"Location",['class'=>'col-md-4 col-form-label text-md-right'])}}
                    {{Form::text('location','',['class'=>'col-md-4 col-form-label text-md form-control'])}}
                    @if ($errors->has('location'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('location') }}</strong>
                        </span>
                    @endif
                </div>
            
                <div class="form-group row">
                        {{Form::label('productImage',"Product image",['class'=>'col-md-4 col-form-label text-md-right'])}}
                        {{Form::file('productImage')}}
                        @if ($errors->has('productImage'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('productImage') }}</strong>
                            </span>
                        @endif
                    </div>
                {{Form::submit('Add Product',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}

@endsection