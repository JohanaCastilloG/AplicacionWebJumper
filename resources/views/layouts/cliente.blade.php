<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @auth
    <style>
        body {
            background: url(../img/18.jpg) no-repeat center center fixed;
            background-size: cover;
        }  
    </style>
    @else
    <style>
        body{
            background: url(../img/9.jpg) no-repeat center center fixed;
            background-size: cover;
        }
    </style>
    @endauth

    <style>
        .blog-footer {
            padding: 2.5rem 0;
            color: #999;
            text-align: center;
            background-color: #f9f9f9;
            border-top: .05rem solid #e5e5e5;
        }

        .blog-footer p:last-child {
            margin-bottom: 0;
        }
    </style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm" >
            <div class="container font-weight-bold" >
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo jumper.png') }}" alt="logo" style="height: 50px;">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="/">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('nosotros')}}">Nosotros</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ubicacion')}}">Ubicación</a>
                        </li>

                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('solicitud.index')}}">Solicitud</a>
                        </li> 
                        @endauth
                        
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="">Pagos</a>
                        </li> 
                        @endauth
                        
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="">Mis certificados</a>
                        </li>
                        @endauth
                        

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @auth
                        <li class="nav-item mr-2">
                            <x-notificacion />
                        </li>
                        @endauth
                        

                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            @role('Administrador')
                                <a class="dropdown-item" href="{{ route('admin.inicio') }}">
                                        {{ __('Administrador') }}
                                </a>
                            @endrole
                            
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="min-height: 100vh">

            @auth
            <x-alert />
            @endauth  

            @yield('content')

        </main>

    </div>
    <footer class="blog-footer ">
        <p>Jumper Online <a href="mailto:JumperOnline@gmail.com">JumperOnline@gmail.com</a> 2021.</p>
        <p>
            <a href="{{route('home')}}">Inicio</a>
        </p>
    </footer>
</body>

</html>