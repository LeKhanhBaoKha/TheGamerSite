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
        <div class="d-flex search-bar">
            <form action="/search" method="get">
                @csrf
                <input type="text" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
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
