<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('theme')}}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet"
          media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('theme')}}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('theme')}}/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
          media="all">
    <link href="{{asset('theme')}}/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <script src="{{asset('theme')}}/vendor/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


    <!-- Main CSS-->
    <link href="{{asset('theme')}}/css/theme.css" rel="stylesheet" media="all">
    <style>
        .progress {
            width: 100%;
            height: 20px;
        }

        .progress-wrap {
            background: green;
            margin: 5px 0;
            overflow: hidden;
            position: relative;
        }

        .progress-bar {
            background: #ddd;
            left: 0;
            position: absolute;
            top: 0;
        }

    </style>
</head>

<body>
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
    @yield('content')

</div>

<!-- Bootstrap JS-->
<script src="{{asset('theme')}}/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="{{asset('theme')}}/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="{{asset('theme')}}/vendor/slick/slick.min.js">
</script>
<script src="{{asset('theme')}}/vendor/wow/wow.min.js"></script>
<script src="{{asset('theme')}}/vendor/animsition/animsition.min.js"></script>
<script src="{{asset('theme')}}/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
{{--<script src="{{asset('theme')}}/vendor/counter-up/jquery.waypoints.min.js"></script>--}}
{{--<script src="{{asset('theme')}}/vendor/counter-up/jquery.counterup.min.js"></script>--}}
<script src="{{asset('theme')}}/vendor/circle-progress/circle-progress.min.js"></script>
<script src="{{asset('theme')}}/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{asset('theme')}}/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="{{asset('theme')}}/vendor/select2/select2.min.js"></script>
<!-- Main JS-->
<script src="{{asset('theme')}}/js/main.js"></script>

</body>

</html>
