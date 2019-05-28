@extends('layouts.app')
@include('layouts.header')
@section('content')

<div class="row px-0 mx-0">
    <div class="col-md-8 px-0 mx-0">
        
        <div class="justify-content-center align-center">            
                <div class="mx-5 py-5">
                       
                    <div class="text-center">
                        <h3 class="green-text mb-5 mt-5"><strong>Welcome Back</strong></h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    
                        <div class="md-form  form-sm mx-5 d-flex justify-content-center">
                            
                                    <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Incorrect Email or password</strong>
                                        </span>
                                    @endif
                                
                        </div>

                            <div class="md-form form-sm mx-5 my-5 d-flex justify-content-center">
                               
                                    <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Incorrect Email or password</strong>
                                        </span>
                                    @endif
                            </div>
                        

                            <div class="md-form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row my-5">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success btn-round">
                                        {{ __('Login') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                    </form>
                    
                </div>
            </div>
        </div>

        <div class="col-md-4 px-0 mx-0">
            <div class="view intro" style="background-image: url('{{asset("images/loginback.jpg")}}');  background-repeat: no-repeat; background-size: cover; background-position: center center; height:100% ">
                <div class="mask rgba-black-strong d-flex"></div>
                <div class="container">
                    <div class="row d-flex flex-column w-100 h-50 justify-content-center">
                        <div class="col-md-12 white-text text-center d-flex flex-column w-100 justify-content-center">
                            <h2 class=" mb-0 pt-md-5 pt-5 white-text ">New here ?</h2>
                            <h5 class="py-5 px-3">Sign up and helps to make the world green</h5>
                        </div>
                    </div>
                    <div class="row d-flex flex-column w-100 h-50 justify-content-center ">
                            <a class="white-text d-flex flex-column w-100 h-50 justify-content-center " href="{{ route('register') }}" > <button type="button" class="btn btn-outline-white waves-effect mx-5">Sign Up </button> </a>
                     </div>
            </div>
        </div>
    
    </div>
</div>


@include('layouts.footer');
@endsection
