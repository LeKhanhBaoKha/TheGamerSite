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
    <main>
        <div class="h-10px w-100 bg-light text-center text-dark p-2 mb-1"><h3 >Lê Khánh Bảo Kha - 0306211041</h3></div>
        <div class="container">
            @section('header')
            <div class="home"><h3><a href="{{route('products.index');}}" class="nav-link text-light"><i class="fa-solid fa-house text-dark"></i> Home </a></h3></div>

            @show
                <div class="py-4 container">
                    @yield('content')
                </div>
        </div>
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 border-top">
            <div class="col-md-4 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-dark"><h2>Code by Kha <i class="fa-regular fa-face-smile"></i></h2></span>
            </div>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
              <li class="m-3"><a class="text-dark" href="#"><h2><i class="fa-brands fa-facebook"></i></h2></a></li>
              <li class="m-3"><a class="text-dark" href="#"><h2><i class="fa-brands fa-google"></i></i></h2></a></li>
              <li class="m-3"><a class="text-dark" href="#"><h2><i class="fa-brands fa-youtube"></i></h2></a></li>
            </ul>
        </footer>
    </main>

</body>
<script src="/bootstrap/css/bootstrap.min.css"></script>
<script src="/fontawesome/js/all.min.js"></script>
<script src="/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("header a").hover(function(){
        $(this).css("transform","scale(1.1)");
        $(this).css("transition", "all .5s");
    },
    function(){
        $(this).css("transition","all .5s");
        $(this).css("transform","scale(1)");
    })
})
</script>
</html>
