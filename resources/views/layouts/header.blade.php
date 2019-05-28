<nav class="navbar navbar-expand-lg fixed-top justify-content-between navbar-dark green">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src='{{asset('images/logo.png')}}' width="40"%>Ruk.lk
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                         <a class="nav-link" href="{{url('rukwiki')}}"><i class="fa fa-wikipedia-w" aria-hidden="true"></i>Ruk Wiki</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href=""><i class="fa fa-forumbee" aria-hidden="true"></i>Forum chat</a>
                        </li>
                    <li class="nav-item">
                <a class="nav-link" href="{{url('products/searchproduct')}}"><i class="fa fa-search" aria-hidden="true"></i>Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('organizationsearch')}}"><i class="fa fa-search" aria-hidden="true"></i>Organizations</a>
                    </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover" href="{{ route('login') }}"><i class="fa fa-user-o" aria-hidden="true"></i>{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-codepen" aria-hidden="true"></i>{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                    
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user-o" aria-hidden="true"></i> {{ Auth::user()->firstname }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->type == 'seller' || Auth::user()->type == 'buyer' || Auth::user()->type == 'volunteer' )
                                <a class="nav-link" href="/user/{{Auth::user()->id}}">Profile</a>
                            @elseif(Auth::user()->type == 'organization')
                                <a class="nav-link" href="/organization/{{Auth::user()->id}}">Profile</a>
                            @elseif (Auth::user()->type == 'admin')
                                <a class="nav-link" href="/admin/{{Auth::user()->id}}">Profile</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>