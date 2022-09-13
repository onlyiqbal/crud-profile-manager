<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Profile Manager</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    {{-- NAVBAR --}}
    <nav id="main-navbar" class="navbar navbar-expand-md navbar-dark bg-dark py-0">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span class="d-none" >ILKOOM</span>
                <img src="{{ asset('img/ilkoom_logo.png') }}"
                class="main-logo d-none d-md-inline" alt="ilkoom logo">
                <img src="{{ asset('img/ilkoom_logo.png') }}"
                class="small-logo d-inline d-md-none" alt="ilkoom logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                {{-- LEFT SIDE OF NAVBAR --}}
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link p-4 active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-4" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-4" href="#">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-4" href="#">Gallery</a>
                    </li>
                </ul>

                {{-- RIGHT SIDE OF NAVBAR --}}
                <ul class="navbar-nav ms-auto">
                    {{-- Authentication Links --}}
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link p-4" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link p-4" href="{{ route('register') }}">
                                Register</a>
                            </li>
                        @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle p-4"
                                href="#" data-bs-toggle="dropdown">
                                {{ Auth::user()->nama }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item p-4 py-md-2"
                                    href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}"
                                    method="POST" class="d-none">
                                    @csrf
                                    </form>
                                </div>
                            </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    {{-- FOOTER --}}
        <footer id="main-footer" class="text-white bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 text-center text-md-start">
                        <a href="index.html">
                        <img src="{{ asset('img/ilkoom_logo.png') }}" style="height: 60px;">
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam cumque, esse modi maxime veniam nulla delectus dolorem
                        </p>
                    </div>

                    <div class="col-md-3 text-center">
                        <h5>Community</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Activity</a></li>
                            <li><a href="#" class="text-white">Members</a></li>
                            <li><a href="#" class="text-white">Groups</a></li>
                            <li><a href="#" class="text-white">Forums</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 text-center">
                        <h5>Our Services</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Our mission</a></li>
                            <li><a href="#" class="text-white">Help/Contact Us</a></li>
                            <li><a href="#" class="text-white">Privacy Policy</a></li>
                            <li><a href="#" class="text-white">Cookie Policy</a></li>
                            <li><a href="#" class="text-white">Terms & Conditions</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 text-center text-md-start">
                        <h5>Hubungi Kami</h5>
                        <div class="text-nowrap"><i class="fas fa-envelope fa-fw me-3"></i>
                        iqbalmenggala29@gmail.com</div>
                        <div class="text-nowrap"><i class="fas fa-phone fa-fw me-3"></i>
                        (021) 123456</div>
                        <div class="text-nowrap"><i class="fas fa-globe fa-fw me-3"></i>
                        https://onlyiqbal.github.io/</div>
                    </div>
                </div>

                <div class="row mt-3 mt-md-0">
                    <div class="col-md-3 me-md-auto text-center text-md-start">
                        <small>&copy; ILKOOM {{ date("Y") }}</small>
                    </div>
                    <div class="col-md-3 text-center text-md-start">
                        <div>
                            <a href="#" class="text-white text-decoration-none me-2">
                                <i class="fab fa-facebook fa-lg"></i>
                            </a>
                            <a href="#" class="text-white text-decoration-none me-2">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                            <a href="#" class="text-white text-decoration-none me-2">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                            <a href="#" class="text-white text-decoration-none me-2">
                                <i class="fab fa-whatsapp fa-lg"></i>
                            </a>
                            <a href="#" class="text-white text-decoration-none me-2">
                                <i class="fab fa-github fa-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
</body>
</html>
