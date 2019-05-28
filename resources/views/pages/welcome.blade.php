@extends('main') 

@section('title'.'|Homepage')

@section('content')

        
    <div class="row" >
            <div class="col-md-12 ">
               <div class="jumbotron  "> 
                  <div class="mask rgba-white-strong d-flex justify-content-center">
                     <h1 class='topic' align="center">Welcome to Ruk wiki</h1>

                  </div>

            
              </div>
            </div>
    </div> <!-- end of row -->
     
  <div class="row container-fluid justify-content-center">
         <div class="col-md-8">
             
            @foreach($posts as $post)
         <div class="block-example border solid postborder px-2 py-2" >
               <div class="post ">
                     <h3 class="font-weight-bold">{{ $post-> title}}</h3>
                        <p class="dark-grey-text px-2 pt-1 "> {{ substr(strip_tags($post->body),0 ,300) }} {{strlen( strip_tags($post-> body)) >300 ?"...": ""}}</p>
                        <div class="">
                           <p class="text-right">  <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-success">Read More</a> </p>
                        </div>
               </div>
         </div>
          
      <hr>

      @endforeach


      </div>
         <div class="col-md-3 col-md-offset-1 ml-5">
            <h2>Categories</h2>

            @foreach($categories as $category)
              <div class="card mt-2 ">
                <div class="card-body">
                  <img class="card-img-top" src="{{asset('wikiimages/'.$category->name.'.jpg')}}">
                    <h6 class="mt-2 mb-1 text-center"><a href="{{ route('category',$category->id) }}">{{ $category->name }}</a></h6>
                </div>
              </div>
            @endforeach
</div>

 




         </div>

      </div>


    

@stop


