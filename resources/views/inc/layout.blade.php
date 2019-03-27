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
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TAGCODE"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

<!-- Top header start -->
<header class="top-header top-header-bg d-none d-xl-block d-lg-block d-md-block" id="top-header-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="list-inline">
                    <a href="tel:1-XXX-XXX-XXX8"><i class="fa fa-phone"></i>1-XXX-XXX-XXX8</a>
                    <a href="tel:info@themevessel.com"><i class="fa fa-envelope"></i>info@themevessel.com</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <ul class="top-social-media pull-right">
                    <li>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i> </a>
                    </li>
                    <li>
                        <a href="#" class="rss"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#">/</a>
                    </li>
                    <li>
                        <a href="login.html" class="sign-in"><i class="fa fa-sign-in"></i> Login </a>
                    </li>
                    <li>
                        <a href="login.html" class="sign-in"><i class="fa fa-user"></i> Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Top header end -->

@include('inc.header')

@yield('content')

@include('inc.footer')


<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="button" class="btn btn-sm btn-color">Search</button>
    </form>
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