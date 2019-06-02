<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{asset('front')}}/css/bootstrap.min.css">
    {{--<link type="text/css" rel="stylesheet" href="{{asset('front')}}/css/magnific-popup.css">--}}
    {{--<link type="text/css" rel="stylesheet" href="{{asset('front')}}/css/jquery.selectBox.css">--}}
    {{--<link type="text/css" rel="stylesheet" href="{{asset('front')}}/css/rangeslider.css">--}}
    {{--<link type="text/css" rel="stylesheet" href="{{asset('front')}}/css/animate.min.css">--}}
    {{--<link type="text/css" rel="stylesheet" href="{{asset('front')}}/css/jquery.mCustomScrollbar.css">--}}
    <link type="text/css" rel="stylesheet" href="{{asset('front')}}/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{asset('front')}}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
            integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
            crossorigin=""></script>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('front')}}/img/favicon.ico" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('front')}}/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('front')}}/css/skins/blue-light.css">

</head>
<body id="top">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TAGCODE"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

<div class="page-wrapper">
    <div id="app" class="wrapper">
        {{-- My Sidebar--}}
        <div id="content">
            {{----}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <a class="navbar-brand logo" href="/">
                                <img style="width: 30px;height: 40px;" src="{{asset('front')}}/img/logos/logo.png"
                                     alt="logo">State Police System
                            </a>
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
                                <li class="nav-item dropdown-item">
                                    <a href="">Profile</a>
                                </li>
                                <li class="nav-item dropdown-item">
                                    <a href="{{route('showPassReset',['id'=>\Illuminate\Support\Facades\Auth::user()->id])}}">Change
                                        Password</a></li>

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              class="dropdown-item">
                                            @csrf
                                            <button type="submit" class="dropdown-item">{{ __('Logout') }}</button>
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

@yield('content')

@include('inc.footer')


<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="#">
        <input type="search" value="" placeholder="type keyword(s) here"/>
        <button type="button" class="btn btn-sm btn-color">Search</button>
    </form>
</div>
<!-- External JS libraries -->
<script src="{{asset('front')}}/js/jquery-2.2.0.min.js"></script>
<script src="{{asset('front')}}/js/popper.min.js"></script>
<script src="{{asset('front')}}/js/bootstrap.min.js"></script>
{{--<script src="{{asset('front')}}/js/jquery.selectBox.js"></script>--}}
{{--<script src="{{asset('front')}}/js/rangeslider.js"></script>--}}
{{--<script src="{{asset('front')}}/js/jquery.magnific-popup.min.js"></script>--}}
{{--<script src="{{asset('front')}}/js/jquery.filterizr.js"></script>--}}
{{--<script src="{{asset('front')}}/js/wow.min.js"></script>--}}
{{--<script src="{{asset('front')}}/js/backstretch.js"></script>--}}
{{--<script src="{{asset('front')}}/js/jquery.countdown.js"></script>--}}
{{--<script src="{{asset('front')}}/js/jquery.scrollUp.js"></script>--}}
{{--<script src="{{asset('front')}}/js/particles.min.js"></script>--}}
{{--<script src="{{asset('front')}}/js/typed.min.js"></script>--}}
{{--<script src="{{asset('front')}}/js/jquery.mb.YTPlayer.js"></script>--}}
{{--<script src="{{asset('front')}}/js/jquery.mCustomScrollbar.concat.min.js"></script>--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0N5pbJN10Y1oYFRd0MJ_v2g8W2QT74JE"></script>--}}
<!-- Custom JS Script -->
<script src="{{asset('front')}}/js/app.js"></script>
</body>
</html>