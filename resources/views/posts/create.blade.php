@extends('main')

@section('title', '| Create New Post')

@section ('headSection')

   {!! Html::style('css/parsley.css') !!}
   {!! Html::style('css/select2.min.css') !!}
   
   
  <!-- texteditor -->
   <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  

   <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar:false
        });
   </script>
 
@endsection


@section('content')
 
 <div class="row">
    <div clss="col-md-8 col-md-offset-2 ">
        <h1>Create New Post</h1>
        <hr>
    </div>
 </div>

    {!! Form::open(array('route' => 'posts.store','data-parsley-validate' => '' , 'files'=> true)) !!}

        {{ Form::label('title','Title:') }}
        {{ Form::text('title',null,array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

        {{ Form::label('slug','slug' ) }}
        {{ Form::text('slug',null,array('class'=> 'form-control', 'required'=> '', 'minlength'=> '5','maxlength'=> '255'))}}
 
        {{ Form::label('category_id','Category:') }}

        <select class="form-control" name="category_id">

         
         @foreach($categories as $category)   
           <option value='{{ $category->id }}' > {{ $category->name}} </option>
         @endforeach  
         
         </select>

         <br>

         {{ Form::label('featured_image' , 'Upload Featured Image:')}}
         {{ Form::file('featured_image') }}

           <br>

        {{ Form::label('body','Post Body:') }}
        {{ Form::textarea('body',null,array('class' => 'form-control' )) }}

        {{ Form::submit('Create Post', array('class'=> 'btn btn-success btn-lg btn-block' ,'style' => 'margin-top:20px;' )) }}

    {!! Form::close() !!}
  </div>
</div>  

@endsection

@section('scripts')

  { !! Html :: script ('js/parsley.min.js') !! }

@endsection