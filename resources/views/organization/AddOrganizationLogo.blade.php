@extends('organization.organizationlayout')

@section('content')

<h2 class="h1-responsive font-weight-bold text-center my-5">Add Your Logo / Company photo</h2>
<p class="grey-text text-center w-responsive mx-auto mb-5">Add your company log or photo of company to make easy to find volunteers.</p>

{!! Form::open(['action' => ['OrganizationController@addorgaizationlogo', Auth::user()->id], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
      
        <div class="form-group row">
            
            {{Form::label('orgImage',"Logo/Photo",['class'=>'col-md-4 col-form-label text-md-right'])}}
            {{Form::file('orgImage')}}
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Save',['class'=>'btn btn-primary mx-5 mt-1'])}}
            @if ($errors->has('orgImage'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('orgImage') }}</strong>
                </span>
            @endif
            
        </div>
        
        
         
        {!! Form::close() !!}
        @include('inc.errormessage')
@endsection