<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
{{--<!-- External CSS libraries -->--}}
{{--<link type="text/css" rel="stylesheet" href="{{'front'}}/css/bootstrap.min.css">--}}
{{--<link type="text/css" rel="stylesheet" href="{{'front'}}/css/magnific-popup.css">--}}
{{--<link type="text/css" rel="stylesheet" href="{{'front'}}/css/jquery.selectBox.css">--}}
{{--<link type="text/css" rel="stylesheet" href="{{'front'}}/css/rangeslider.css">--}}
{{--<link type="text/css" rel="stylesheet" href="{{'front'}}/css/animate.min.css">--}}
{{--<link type="text/css" rel="stylesheet" href="{{'front'}}/css/jquery.mCustomScrollbar.css">--}}
{{--<link type="text/css" rel="stylesheet" href="{{'front'}}/fonts/font-awesome/css/font-awesome.min.css">--}}
{{--<link type="text/css" rel="stylesheet" href="{{'front'}}/fonts/flaticon/font/flaticon.css">--}}
<!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{'front'}}/img/favicon.ico" type="image/x-icon">

{{--<!-- Google fonts -->--}}
{{--<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">--}}

<!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('front')}}/css/style2.css">
    {{--<link rel="stylesheet" type="text/css" id="style_sheet" href="{{'front'}}/css/skins/default.css">--}}

</head>
<body id="top">
{{--<div class="page_loader"></div>--}}
<div id="app" class="wrapper">
    {{-- My Sidebar--}}
    <nav id="sidebar">
        <div class="sidebar-header">
            <i href="{{asset('front')}}/img/favicon.ico"></i>
            <a class="navbar-brand" href="{{ url('/') }}">
                State Police System
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>


    <div id="content">

        {{----}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Open Sidebar</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
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
</div>
{{--<!-- External JS libraries -->--}}

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>


{{--<script src="{{'front'}}/js/jquery-2.2.0.min.js"></script>--}}
{{--<script src="{{'front'}}/js/popper.min.js"></script>--}}
{{--<script src="{{'front'}}/js/bootstrap.min.js"></script>--}}
{{--<script src="{{'front'}}/js/jquery.selectBox.js"></script>--}}
{{--<script src="{{'front'}}/js/rangeslider.js"></script>--}}
{{--<script src="{{'front'}}/js/jquery.magnific-popup.min.js"></script>--}}
{{--<script src="{{'front'}}/js/jquery.filterizr.js"></script>--}}
{{--<script src="{{'front'}}/js/wow.min.js"></script>--}}
{{--<script src="{{'front'}}/js/backstretch.js"></script>--}}
{{--<script src="{{'front'}}/js/jquery.countdown.js"></script>--}}
{{--<script src="{{'front'}}/js/jquery.scrollUp.js"></script>--}}
{{--<script src="{{'front'}}/js/particles.min.js"></script>--}}
{{--<script src="{{'front'}}/js/typed.min.js"></script>--}}
{{--<script src="{{'front'}}/js/jquery.mb.YTPlayer.js"></script>--}}
{{--<script src="{{'front'}}/js/jquery.mCustomScrollbar.concat.min.js"></script>--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0N5pbJN10Y1oYFRd0MJ_v2g8W2QT74JE"></script>--}}
{{--<script src="{{'front'}}/js/ie-emulation-modes-warning.js"></script>--}}
{{--<!-- Custom JS Script -->--}}
{{--<script  src="{{'front'}}/js/app.js"></script>--}}
</body>
</html>