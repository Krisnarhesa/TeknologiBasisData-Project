<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background: #e0e4cc">
            <!-- <button class="btn text-dark mx-1" id="menu-btn"><i class="fa fa-bars"></i></button> -->
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <strong>Home</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto" >
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

        <!-- {{-- SIDE BAR 2.0 START --}}
        <nav class="sidebar navbar-expand d-flex flex-column align-item-start" id="sidebar">
            {{-- <a href="/" class="navbar-brand text light mt-5">
                    <div class="display-5 fw-bold text-center">HOME</div>
                </a> --}}
            <ul class="navbar-nav d-flex flex-column">
                <li class="nav-item">
                    <a href="/user" class="nav-link text-dark pl-4 p-3">USER</a>
                </li>
                <li class="nav-item">
                    <a href="/pembelian" class="nav-link text-dark pl-4 p-3">PEMBELIAN</a>
                </li>
                <li class="nav-item">
                    <a href="/pengiriman" class="nav-link text-dark pl-4 p-3">PENGIRIMAN</a>
                </li>
                <li class="nav-item">
                    <a href="/produk" class="nav-link text-dark pl-4 p-3">PRODUK</a>
                </li>
                <li class="nav-item">
                    <a href="/review" class="nav-link text-dark pl-4 p-3">REVIEW</a>
                </li>
            </ul>
        </nav> -->
        <section class="p-4 my-container">
            
            <section class="py-5 text-center container-fluid">
                <div class="row py-5">
                    <div class="col-md-12">
                        <h1 class="text-black">@yield('header')</h1>
                    </div>
                </div>
            </section>

            <div class="bg-light">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </section>

        {{-- SIDE BAR 2.0 END --}}
    </div>
</body>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
    var menu_btn = document.querySelector("#menu-btn")
    var sidebar = document.querySelector("#sidebar")
    var container = document.querySelector(".my-container")
    menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav")
        container.classList.toggle("active-cont")
    })
</script>

</html>
