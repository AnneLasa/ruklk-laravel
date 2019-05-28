@extends('layouts.profilelayout')

@section('content')

<div class="card w-100">
    <div class="card-header">
        <h3>RukChat</h3>
        <div id="app">
        <profilechat-app :user="{{auth()->user()}}"></profilechat-app> 
        </div>
    </div>
</div>

@endsection