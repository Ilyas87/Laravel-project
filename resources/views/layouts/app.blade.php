<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="" rel="stylesheet">
    <style>
        .image{
            background: url('storage/background/wallpaper.jpg') no-repeat center;
            background-size: cover;"
        }
    </style>
</head>
<body>
    <div id="app" class="image min-vh-100">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="collapse navbar-collapse col-md-12 justify-content-between">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        <li class="nav-item d-flex">
                            <a href="{{ route('main') }}" class="text-secondary text-decoration-none d-flex align-items-center p-0">
                                <h2 class="my-0">MINI</h2>
                                <img src="{{ asset('storage/logo/logo.svg') }}" height="34" class="pl-1">
                            </a>
                        </li>
                        <li class="nav-item px-4">
                            @component('components.search-form')
                            @endcomponent
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav" style="font-size: large">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <strong>Вход</strong>
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <strong>Регистрация</strong>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="dropdown nav-item">
                                <a data-toggle="dropdown" class="dropdown-toggle text-secondary text-decoration-none" href="#">
                                    <strong>{{ Auth::user()->username }}</strong>
                                    <img src="{{ Storage::url(Auth::user()->profile->profileImage()) }}" width="30" height="30" class="rounded-circle border mx-1">
                                </a>

                                <ul class="dropdown-menu text-left p-1" role="menu">
                                    <li>
                                        <a class="text-secondary text-decoration-none page-link border-0" href="{{ route('profile', Auth::user()->id) }}">
                                            <span>Моя страница</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-secondary text-decoration-none page-link border-0" href="{{ route('profile.edit', Auth::user()->id) }}">
                                            <span>Редактировать</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-secondary text-decoration-none page-link border-0" href="{{ route('friends') }}">
                                            <span>Мои друзья</span>
                                        </a>
                                    </li>
                                    <hr class="m-1">
                                    <li>
                                        <a class="text-secondary text-decoration-none page-link border-0" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span>Выйти</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-3">
            @yield('content')
        </main>

    </div>
</body>
</html>
