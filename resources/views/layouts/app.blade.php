<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="{{ asset('js/app.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CMS') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                                        My Profile
                                      
                                    </a>
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

        <main class="py-4">
          
          @auth
          
          <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message')}}
                </div>
            @elseif(session()->has('warning'))
                <div class="alert alert-danger">
                    {{ session('warning')}}
                </div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    @if(auth()->user()->isAdmin())
                    <ul class="list-group mt-5">
                        <li class="list-group-item">
                            <a href="{{route('users.index')}}" class="">Users</a>
                        </li>
                    </ul>
                    @endif

                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('posts.index')}}" class="href">Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('categories.index')}}" class="href">Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('tags.index')}}" class="href">Tags</a>
                        </li>
                    </ul>
                    <ul class="list-group mt-5">
                        <li class="list-group-item">
                            <a href="{{route('trashed-posts')}}" class="">Trash</a>
                        </li>
                    </ul>

                    <ul class="list-group mt-5">
                        <li class="list-group-item">
                            <a href="{{route('trashed-cat')}}" class="">Category Trash</a>
                        </li>
                    </ul>
                    
                </div>
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
          </div>
          @else
          @yield('content')
          @endauth
              
        </main>
    </div>
    <!-- Scripts -->
    @yield('scripts')
</body>
</html>
