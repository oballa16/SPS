<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{asset('front')}}/css/bootstrap.min.css">
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
<div class="page_loader"></div>

<div class="page-wrapper">
    <div id="app" class="wrapper">
        {{-- My Sidebar--}}
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light rounded">
                <a class="navbar-brand logo" href="/">
                    <img src="{{asset('front')}}/img/logos/logo.png" alt="logo" style="width: 20px;height: 30px;"> State
                    Police System
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}"
                               id="navbarDropdownMenuLink7"> {{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link"
                               href="{{route('showPassReset',['id'=>\Illuminate\Support\Facades\Auth::user()->id])}}"
                               id="navbarDropdown9"> Change Password
                            </a>
                        </li>

                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  class="dropdown-item">
                                @csrf
                                <button type="submit" class="dropdown-item">{{ __('Logout') }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

@yield('content')

<!-- External JS libraries -->
<script src="{{asset('front')}}/js/jquery-2.2.0.min.js"></script>
<script src="{{asset('front')}}/js/popper.min.js"></script>
<script src="{{asset('front')}}/js/bootstrap.min.js"></script>
<!-- Custom JS Script -->
<script src="{{asset('front')}}/js/app.js"></script>
</body>
</html>