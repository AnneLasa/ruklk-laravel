@extends('layouts.profilelayout')

@section('content')
<section class="text-center">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center my-5">Edit Your Details</h2>
        <!-- Section description -->
        <p class="grey-text text-center w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur veniam.</p>
        @include('inc.errormessage')
        
        {!! Form::open(['action' => ['ProductController@edit', $user->id], 'method'=>'POST']) !!}
            <div class="form-group row">
                {{Form::label('firstname',"First name",['class'=>'col-md-4 col-form-label text-md-right'])}}
                {{Form::text('firstname',$user->firstname,['class'=>'col-md-4 col-form-label text-md form-control'])}}
                @if ($errors->has('firstname'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group row">
                {{Form::label('secondname',"Second name",['class'=>'col-md-4 col-form-label text-md-right'])}}
                {{Form::text('secondname',$user->secondname,['class'=>'col-md-4 col-form-label text-md form-control'])}}
                @if ($errors->has('secondname'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('secondname') }}</strong>
                   </span>
                @endif
            </div>

            <div class="form-group row">
                {{Form::label('email',"Email",['class'=>'col-md-4 col-form-label text-md-right'])}}
                {{Form::email('email',$user->email,['class'=>'col-md-4 col-form-label text-md form-control'])}}
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                   </span>
                @endif
            </div>

            <div class="form-group row">
                    {{Form::label('password',"Password",['class'=>'col-md-4 col-form-label text-md-right'])}}
                    {{Form::password('password',['class'=>'col-md-4 col-form-label text-md form-control'])}}
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                       </span>
                    @endif
                </div>

                <div class="form-group row">
                        {{Form::label('password-confirm',"Confirm Password",['class'=>'col-md-4 col-form-label text-md-right'])}}
                        {{Form::password('password-confirm',['class'=>'col-md-4 col-form-label text-md form-control'])}}
                        @if ($errors->has('password-confirm'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password-confirm') }}</strong>
                           </span>
                        @endif
                    </div>

                    <div class="form-group row">
                            {{Form::label('address',"Address",['class'=>'col-md-4 col-form-label text-md-right'])}}
                            {{Form::text('address',$user->address,['class'=>'col-md-4 col-form-label text-md form-control'])}}
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                               </span>
                            @endif
                    </div>

                    <div class="form-group row">
                            {{Form::label('mobileno',"Mobile No",['class'=>'col-md-4 col-form-label text-md-right'])}}
                            {{Form::text('mobileno',$user->mobileno,['class'=>'col-md-4 col-form-label text-md form-control'])}}
                            @if ($errors->has('mobileno'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mobileno') }}</strong>
                               </span>
                            @endif
                    </div>  
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Save',['class'=>'btn btn-primary'])}}                  
        {!! Form::close() !!}

@endsection