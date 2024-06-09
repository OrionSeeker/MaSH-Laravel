<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Mataram Skill Hub') }}</title> -->
    <title>IT Skill Hub</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css'); }}" type="text/css">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('style')
</head>
<body class = 'd-flex flex-column min-vh-100'>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbar-template">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/beranda') }}">
                    <!-- {{ config('app.name', 'Mataram Study Hub') }} -->
                    IT Skill Hub
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li>
                            <a href="{{url('list-kelas')}}" class="nav-link">Daftar Kelas</a>
                        </li>
                        <li>
                        <div class="dropdown hover-dropdown">
                            <a href="#" role="button" class="nav-link dropdown-toggle" id="dropdownMenuLink" aria-expanded="false">
                                Hubungi Kami
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="mailto:admin@mataram-sh.com"><i class="bi bi-envelope-at-fill"></i> Email</a></li>
                                <li><a class="dropdown-item" href="https://wa.me/+6281917921234"><i class="bi bi-whatsapp"></i> Whatsapp</a></li>
                                <li><a class="dropdown-item" href="https://instagram.com/michael.eff"><i class="bi bi-instagram"></i> Instagram</a></li>
                                <li><a class="dropdown-item" href="https://twitter.com"><i class="bi bi-twitter"></i> Twitter</a></li>
                                <li><a class="dropdown-item" href="https://facebook.com"><i class="bi bi-facebook"></i> Facebook</a></li>
                            </ul>
                        </div>
                        </li>
                        @can('isAdmin')
                        <li>
                            <a href="{{url('kelola-user')}}" class="nav-link">Kelola User</a>
                        </li>
                        <li>
                            <a href="{{url('kelas')}}" class="nav-link">Kelola Kelas</a>
                        </li>
                        @endcan
                        <!-- <li>
                            <a href="{{url('peserta')}}" class="nav-link">Atur peserta</a>
                        </li> -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
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
                            <li>
                                <a href="{{url('home')}}" class="nav-link" style="padding-right:20px">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div class="footer mt-auto">
    <footer>
        <div class="social">
            <a href="#"><i class="bi bi-envelope-at-fill"></i></a>
            <a href="#"><i class="bi bi-whatsapp"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
        </div>
        <div class="credit">
            <!-- <p>Created by <a href="">Serendipity Team</a> | &copy; 2024.</p> -->
            <p>Created by Serendipity Team | &copy; 2024.</p>
        </div>
    </footer>
</div>
</body>
</html>
