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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    @yield('CSS')
</head>
<body>
    <header>
        @show
        <div class="h-10px w-100 bg-light text-center text-dark p-2 mb-1 d-flex justify-content-between flex-row" id="">
            <div class="d-flex align-items-center first flex-row col-4" id="navigation">
                <div class="home">
                    <h3>
                        <a href="{{route('products.index')}}" class="nav-link text-dark nav" id="home">
                            <i class="fa-solid fa-house text-dark"></i> Home
                        </a>
                    </h3>
                </div>
                @yield('header')
            </div>
            <div class="second d-flex flex-row w-auto justify-content-center col-4">
                @auth
                    <h1 class="m-0 pt-2">Hello {{Auth::user()->name}}</h1>
                @endauth
                @guest
                    <h3 class="m-0 pt-2">Lê Khánh Bảo Kha - 0306211041</h3>
                @endguest
            </div>
            <div class="third col-4 d-flex flew-row justify-content-end mt-2"  style="height:40px; gap:5px;">
                @auth
                    <a href="{{route('logout')}}" class="btn btn-danger ">Logout</a>
                @endauth
                @guest
                    <a href="{{route('login')}}" class="btn btn-danger">Login</a>
                @endguest
                @can('isAdmin')
                    <a href="{{route('dashboard')}}" class="btn btn-danger">Admin dasboard</a>
                @endcan
            </div>
        </div>
    </header>
    <main class="d-flex flex-column align-items-start">
        <div class="py-4 container">
            @yield('content')
        </div>
    </main>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-1 border-top">
        <div class="col-md-4 d-flex align-items-center">
        <span class="mb-3 mb-md-0 text-dark"><h2>Code by Kha <i class="fa-regular fa-face-smile"></i></h2></span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="m-3"><a class="text-dark" href="#"><h2><i class="fa-brands fa-facebook"></i></h2></a></li>
        <li class="m-3"><a class="text-dark" href="#"><h2><i class="fa-brands fa-google"></i></i></h2></a></li>
        <li class="m-3"><a class="text-dark" href="#"><h2><i class="fa-brands fa-youtube"></i></h2></a></li>
        </ul>
    </footer>
</body>
@yield('script')
<script src="/bootstrap/css/bootstrap.min.css"></script>
<script src="/fontawesome/js/all.min.js"></script>
<script src="/jquery/jquery.min.js"></script>
</html>

