
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>1640</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
          integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <!-- <script src="js/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"> -->
</head>

<body>

<!-- Start Top Nav -->

<nav class="navbar-expand-lg navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <a class="navbar-sm-brand text-light text-decoration-none"
                   href="mailto:trannhatminh295@gmail.com">1640 Enterprise Web Software Development (Group 2)</a>

            </div>
            <div>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                        class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/sendohtks/" target="_blank"><i
                        class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i
                        class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/in/minh-tr%E1%BA%A7n-nh%E1%BA%ADt-6b419a180/"
                   target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->

<!-- Header -->
<header class="header trans_300">
    <!-- main Navigation -->
    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a class="nav-link" href="{{ route('home') }}"><img src="{{asset('img/logo.jpg')}}" class="logo" alt="logo"></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('idea.index') }}">Home</a>
                            </li>

                            <li><a class="nav-link" href="#">Category</a>
                                <ul class="dropdown">
                                    <li><a class="category1" href="#">Infomation Technology</a></li>
                                    <li><a class="category1" href="#">Business Administration</a></li>
                                    <li><a class="category1" href="#">Graphic Design</a></li>
                                    <li><a class="category1" href="#">Event Management</a></li>
                                    <li><a class="category1" href="#">Media Management</a></li>
                                    <li><a class="category1" href="#">Marketing Manager</a></li>
                                    <li><a class="category1" href="#">Others</a></li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('idea.myIdea') }}">MyIdeas</a>
                            </li>
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
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
</header>
                <main class="py-4">
                @yield('content')
                </main>
</body>

</html>
