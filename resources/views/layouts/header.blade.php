
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

                            <li>
                                <div class="nav-item dropdown">
                                    <a onclick="myFunction()" class="nav-link dropbtn">Faculties</a>

                                    <div id="myDropdown" class="dropdown-content">
                                       @foreach($categories = \App\Models\Category::all() as $category)
                                            <a href="{{ route('idea.getIdeas', $category->id) }}"
                                               class="nav-link nav-link-faded has-icon active">{{ $category->name }}</a>
                                        @endforeach

                                    </div>
                                </div>
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
                                    <li>
                                        <div class="nav-item dropdown">
                                            <a onclick="logoutFunction()" class="nav-link dropbtn">
                                                {{ Auth::user()->name }}
                                            </a>
                                            <div id="logoutDropdown" class="dropdown-content">
                                                <a class="category1" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endguest
                        </ul>
</header>
                <main class="py-4">
                @yield('content')
                </main>
</body>
<script src=" {{ asset('js/custom.js') }}" defer></script>
<!-- Isotope File -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>

</html>
