<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{'front'}}/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="{{'front'}}/css/magnific-popup.css">
    <link type="text/css" rel="stylesheet" href="{{'front'}}/css/jquery.selectBox.css">
    <link type="text/css" rel="stylesheet" href="{{'front'}}/css/rangeslider.css">
    <link type="text/css" rel="stylesheet" href="{{'front'}}/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="{{'front'}}/css/jquery.mCustomScrollbar.css">
    <link type="text/css" rel="stylesheet" href="{{'front'}}/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{'front'}}/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{'front'}}/img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{'front'}}/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{'front'}}/css/skins/default.css">

</head>
<body id="top">
<div class="page_loader"></div>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    State Police System
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    <!-- External JS libraries -->
    <script src="{{'front'}}/js/jquery-2.2.0.min.js"></script>
    <script src="{{'front'}}/js/popper.min.js"></script>
    <script src="{{'front'}}/js/bootstrap.min.js"></script>
    <script src="{{'front'}}/js/jquery.selectBox.js"></script>
    <script src="{{'front'}}/js/rangeslider.js"></script>
    <script src="{{'front'}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{'front'}}/js/jquery.filterizr.js"></script>
    <script src="{{'front'}}/js/wow.min.js"></script>
    <script src="{{'front'}}/js/backstretch.js"></script>
    <script src="{{'front'}}/js/jquery.countdown.js"></script>
    <script src="{{'front'}}/js/jquery.scrollUp.js"></script>
    <script src="{{'front'}}/js/particles.min.js"></script>
    <script src="{{'front'}}/js/typed.min.js"></script>
    <script src="{{'front'}}/js/jquery.mb.YTPlayer.js"></script>
    <script src="{{'front'}}/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0N5pbJN10Y1oYFRd0MJ_v2g8W2QT74JE"></script>
    <script src="{{'front'}}/js/ie-emulation-modes-warning.js"></script>
    <!-- Custom JS Script -->
    <script  src="{{'front'}}/js/app.js"></script>
</body>
</html>