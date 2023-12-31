<footer class="d-flex flex-wrap justify-content-between align-items-center py-1 border-top">
    <div class="col-md-4 d-flex align-items-center">
        <span class="mb-3 mb-md-0 text-dark"><h2>Code by Kha <i class="fa-regular fa-face-smile"></i></h2></span>
    </div>
    <div class="second d-flex flex-row w-auto justify-content-center col-4">
        @auth
            <h1 class="m-0 pt-2">Hello {{Auth::user()->name}}</h1>
        @endauth
        @guest
            <h3 class="m-0 pt-2">Lê Khánh Bảo Kha - 0306211041</h3>
        @endguest
    </div>
    <ul class="col-md-4 justify-content-end list-unstyled d-flex">
        <li class="m-3"><a class="text-dark" href="#"><h2><i class="fa-brands fa-facebook"></i></h2></a></li>
        <li class="m-3"><a class="text-dark" href="#"><h2><i class="fa-brands fa-google"></i></i></h2></a></li>
        <li class="m-3"><a class="text-dark" href="#"><h2><i class="fa-brands fa-youtube"></i></h2></a></li>
    </ul>
</footer>
