@extends('main')

@section('title', '| View Post')


@section('content')

  <div class="row">
    
      <div class="col-md-8" >
         <img src="{{ asset('wikiimages/'. $post->image)}}" style="width:90%; height:auto;" alt="" />

         

          <h1>{{ $post->title }}</h1> 
         <br>

          <p class="lead">{!! $post->body !!}</p>
      
      </div>  
        
       <div class="col-md-4 bg-light ">
           <div class="well">
               <dl class="dl-horizontal">
                   <dt>Url :</dt>
                   <dd><a href="{{ route('blog.single', $post->slug) }}"> {{ route('blog.single', $post->slug) }}</a></dd>
               </dl> 
            </div>      

               <dl class="dl-horizontal">
                   <dt>Category :</dt>
                   <dd>{{ $post->category->name}}</dd>
               </dl



     
               <dl class="dl-horizontal">
                   <dt>Create at :</dt>
                   <dd>{{date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
               </dl>
                
               <dl class="dl-horizontal">
                   <dt>Last Updated :</dt>
                   <dd>{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</dd>
               </dl>
                <hr>

                 <div class="row">
                     <div class="col-sm-6">
                         {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-success btn-block'))!!}
                         
                     </div>
                        <div class="col-sm-6">
                            {!! Form::open(['route' =>['posts.destroy', $post->id] , 'method' => 'DELETE']) !!}


                            {!! Form::submit('Delete',['class'=> 'btn btn-danger btn-block'])!!}


                            {!! Form::close() !!}
                        </div>
                    </div>
            
                  <div class="row">
                      <div class="col-md-12">
                          {{ Html::linkRoute('posts.index','<< see All Posts >>', array(),['class'=>'btn btn-
                              primary btn-block btn-h1-spacing']) }}
                
                      </div>
                  </div>
        </div>
    </div>
</div>
        
        

@endsection