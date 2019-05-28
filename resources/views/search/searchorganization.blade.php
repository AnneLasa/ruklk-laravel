@extends('layouts.app')
<div class="mb-5">
    @include('layouts.header')
</div>
@section('content')
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-body pb-1 ">
                    <form class="form-inline active-cyan-4" action="/organizationsearch"> 
                        <div class="row">
                            <div class="col-md-11">
                                <input class="form-control form-control-sm mr-3 w-100" type="text" placeholder="Search" aria-label="Search" name="search">
                            </div> 
                            <div class="col-md-1">
                                <button class="btn-sm btn-success w-20 h-20" value="Search"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
                            </div>   
                        </div>     
                    </form> 
                </div>
            </div>
        </div>
    </div>

    <div class="card container mt-5">
            <div class="card-body">
                @if(count($users)>0)
                
                    @foreach($users as $user)
                    <div class="row border border-succes my-2 mx-2"> 
                        <div class="col-md-3">
                             <img src= "{{asset('Products/'.$user->logo)}}" class="w-75" alt="sample photo" >   
                        </div>
                        <div class="col-md-8">
                            <h3 class="text-capitalize my-4">{{$user->firstname}} {{$user->secondname}}</h3 >
                            <p class='px-3'>Address : {{$user->address}}</p>
                            <p class='px-3 text-warning font-weight-bold'>mobile no : {{$user->mobileno}}</p>
                            
                        </div>
                    </div>    
                        
                    @endforeach
                    {{$users->links()}}
                @else
                    <p class="d-flex justify-content-center"> Sorry !!! No matching items </p>
                @endif
            
            </div>
        </div>
    </div>
</div> 
</div>
@endsection