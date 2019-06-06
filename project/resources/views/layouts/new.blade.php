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

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('front')}}/img/favicon.ico" type="image/x-icon">
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
            <nav class="navbar navbar-expand-lg navbar-light rounded" style="margin-bottom: 40px;margin-top: 20px">
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
