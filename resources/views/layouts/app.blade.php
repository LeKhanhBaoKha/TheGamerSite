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

    @include('partials.header')

    <main class="d-flex flex-column align-items-start">
        <div class="py-4 container">
            @yield('content')
        </div>
    </main>

    @include('partials.footer')
</body>
@yield('script')
<script src="/bootstrap/css/bootstrap.min.css"></script>
<script src="/fontawesome/js/all.min.js"></script>
<script src="/jquery/jquery.min.js"></script>
</html>

