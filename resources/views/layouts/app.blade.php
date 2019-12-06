<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ExpoCANP Solution</title>

    <!-- Scripts -->
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/popper.min.js')}}"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

     <!-- Fonts -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-green shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'ExpoCANP') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            @if (Auth::user()->access_level == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/cursos') }}">{{ __('Cursos') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/turmas') }}">{{ __('Turmas') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/eventos') }}">{{ __('Eventos') }}</a>
                                </li>
                            @elseif (Auth::user()->access_level == 'user')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/inscricoes') }}">{{ __('Inscrições') }}</a>
                                </li>
                            @endif
                        @endauth
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
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastre-se') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->access_level == 'admin')
                                        <a class="dropdown-item link-green" href="{{ route('home') }}">
                                            {{ __('Painel do Adminstrador') }}
                                        </a>
                                        <a class="dropdown-item link-green" href="{{ route('changePassword') }}">
                                            {{ __('Alterar Senha') }}
                                        </a>
                                    @elseif (Auth::user()->access_level == 'user')
                                        <a class="dropdown-item link-green" href="{{ route('home') }}">
                                            {{ __('Painel do Usuário') }}
                                        </a>
                                        <a class="dropdown-item link-green" href="{{ route('changePassword') }}">
                                            {{ __('Alterar Senha') }}
                                        </a>
                                    @endif

                                    <a class="dropdown-item link-green" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
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
            @yield('content')
        </main>
    </div>
</body>
</html>
