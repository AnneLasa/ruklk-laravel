@extends('admin.adminlayout')

@section('content')
<main class="pt-5 mx-lg-5">
    <div class="card mb-4">
        <div class="card-body">
            <h3 class='grey-text text-center'>Manage Users</h3>
            
        </div>
    </div>
    <div class="card">
        
        <div class="card-body px-5 py-3 ">
            @if(count($users)>0)
                @foreach ($users as $user)
                
                <div class="px-2 my-2">
                    <div class="row userrow">
                      <div class="col-md-5">
                        <p class="userrow-title">{{$user->firstname}} {{$user->secondname}}</p>
                        <p class="userrow-description">{{$user->type}}</p>
                        <p class="userrow-description">{{$user->email}}</p>
                        
                      </div>
                      <div class="col-md-6">
                            @if($user->verified == 1)
                            <p class="userrow-description">verified user</p>
                            @elseif($user->verified == 0)
                            <p class="userrow-description">Unverified user</p>
                            @else
                            <p class="userrow-description">Banned user</p>
                        @endif
                      </div>
                       <div class="col-md-1">
                         <a href="{{url('admin/'.Auth::user()->id.'/showusers/'.$user->id)}}"><h1><i class="fas fa-angry userbanned"></i></h1></a>
                     </div> 
     
                    </div>
                  
                  
                  </div>
                @endforeach
                <div class="row justify-content-center">
                    {{$users->links()}}
                </div>
            @else
                    <h4 class="text-center"> No items to approve</h4>
            @endif
        </div>
    </div>
    
</main>
@endsection 