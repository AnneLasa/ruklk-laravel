@extends('admin.adminlayout')

@section('content')
<main class="pt-5 mx-lg-5">
    <div class="card mb-4">
        <div class="card-body">
            <h3 class='grey-text text-center'>Advertisement for aprovel</h3>
            
        </div>
    </div>
    <div class="card">
        
        <div class="card-body px-5 py-3 ">
            @if(count($event)>0)
                @foreach ($event as $events)
                
                    <div class="row border my-3 px-3">
                        <div class="col-md-4">
                            <img src= "{{asset('Events/'.$events->adimage)}}" style='width:150px; height:150px;' class='px-1 py-1' alt="sample photo">    
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <h5 class="text-capitalize  mx-1 px-1 py-4">{{$events->eventname}}</h5>
                            </div>
                            <div class="row">
                                <p>{{$events->eventownername}}</p>
                            </div>
                            <div class="row">
                                <p>{{$events->ownermobileno}}</p>
                            </div>
                        </div>
        
                        <div class="col-md-2">
                            <div class="row pt-5 mt-3">
                                <div class="col-md-6">
                               <a href="{{url('admin/'.Auth::user()->id.'/showevents/'.$events->id)}}">
                                    <h1><i class=" aicon fa fa-check" aria-hidden="true"></i></h1>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{url('admin/'.Auth::user()->id.'/rejectadvertisment/'.$events->id)}}">
                                        <h1><i class="aicon fa fa-window-close" aria-hidden="true"></i></h1>
                                    </a>  
                                </div>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
                {{$event->links()}}
            @else
                    <h4 class="text-center"> No items to approve</h4>
            @endif
        </div>
    </div>
    
</main>
@endsection 