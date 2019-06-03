@extends('inc.layout')

@section('title')
State Police System
@stop


@section('content')
<div class="banner" id="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('front')}}/img/police2.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100">
                    <div class="carousel-content container">
                        <div class="text-l">
                            <h1 data-animation="animated fadeInDown delay-05s">State Police System</h1>
                            <p data-animation="animated fadeInUp delay-10s">Ease your work</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('front')}}/img/police3.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100">
                    <div class="carousel-content container">
                        <div class="text-r">
                            <h1 data-animation="animated fadeInDown delay-05s">Our services</h1>
                            <p data-animation="animated fadeInUp delay-10s">Protect the people</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{'front'}}/img/police.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100">
                    <div class="carousel-content container">
                        <div class="text-c">
                            <h1 data-animation="animated fadeInDown delay-05s">State Police System</h1>
                            <p data-animation="animated fadeInUp delay-10s">Welcome to the State Police's Online system.</p>
                            <a data-animation="animated fadeInUp delay-10s" href="/login" class="btn btn-lg btn-round btn-theme">Already registred? Login</a>
                            <a data-animation="animated fadeInUp delay-10s" href="/register" class="btn btn-lg btn-round btn-white-lg-outline">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="slider-mover-left" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="slider-mover-right" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </span>
        </a>
    </div>
</div>
<!-- banner end -->

<!-- Managment area start -->
<div class="managment-area-2 content-area-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="managment-info">
                    <h1><span>Misioni </span></h1>
                    <div class="managment-border-"></div>
                    <p>“Garantimi i një mjedisi të sigurtë për komunitetin nëpërmjet policimit me standartet më të larta të performancës, krijimit të një kulture bashkëkohore manaxhimi dhe të mbështetur meinfrastrukturën më të përparuar”</p>
                    <ul>
                        <li><i class="flaticon-up-arrow"></i>“Së bashku për një komunitet më të sigurt”</li>
                        <li><i class="flaticon-building"></i>Synimi strategjik aftagjatë i Policisë së Shtetit është krijimi i një mjedisi sa më të sigurt për shoqërinë shqiptare, i cili do të sjellë përmirësim në cilësinë e jetës së qytetarëve duke e bërë Shqipërinë një vend të dëshirueshëm për të punuar e jetuar.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 offset-lg-1">
                <div class="managment-slider">
                    <div id="carouselExampleIndicators-managment" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators-managment" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators-managment" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators-managment" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 img-fluid" src="http://placehold.it/540x320" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 img-fluid" src="http://placehold.it/540x320" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 img-fluid" src="http://placehold.it/540x320" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Managment area end -->

<!-- services start -->
<div class="services content-area-2 bg-grea">
    <div class="container">
        <div class="main-title">
            <h1><span>Our</span> Services</h1>
            <p>Explore some of the services found in the online State Police System</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="media services-info">
                    <img src = "https://banner2.kisspng.com/20180420/wpw/kisspng-help-desk-issue-tracking-system-service-ticket-vector-movie-tickets-5ad9c579309040.8611790915242213051989.jpg" width="100px" height="80px">
                    <div class="media-body"><a data-animation="animated fadeInUp delay-10s" href="{{route('checkTickets')}}"
                                               >
                        <h5>Check Your Tickets</h5>
                            <p>See if there are any parking tickets that you are not aware of</p></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="media services-info">
                    <img src = "https://image.flaticon.com/icons/png/512/869/869409.png" width="100px" height="100px">
                    <div class="media-body" ><a data-animation="animated fadeInUp delay-10s" href="{{route('listWantedPeople')}}">
                        <h5>Stay safe at anytime</h5>
                        <p>Check all the list of wanted people in our country located in our database</p></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="media services-info">
                    <img src="http://cdn.onlinewebfonts.com/svg/img_299397.png" width="100px" height="100px">
                    <div class="media-body"><a data-animation="animated fadeInUp delay-10s" href="{{route('fileComplaint')}}">
                        <h5>File a Complaint</h5>
                        <p>For every irregularity or corruption case, please send us your complaint</p></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="media services-info">
                    <img src="https://www.pngfind.com/pngs/m/114-1147878_location-poi-pin-marker-position-red-map-google.png" width="100px" height="100px">
                    <div class="media-body"><a data-animation="animated fadeInUp delay-10s" href="{{route('searchPatrols')}}">
                        <h5 class="mt-0">Search for Patrols nearby</h5>
                        <p>Check the map for patrols nearby you</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- services end -->

<!-- Agent start -->
<div class="agent content-area-2">
    <div class="container">
        <div class="main-title">
            <h1><span>Our</span> Team</h1>
            <p>Meet out small team that make those great products.</p>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="agent-2">
                    <div class="agent-photo">
                        <a href="team.html">
                            <img src="http://placehold.it/255x212" alt="avatar" class="img-fluid">
                        </a>
                    </div>
                    <div class="agent-details">
                        <h5><a href="team.html">Martin Smith</a></h5>
                        <p>Web Developer</p>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                <div class="agent-2">
                    <div class="agent-photo">
                        <a href="team.html">
                            <img src="http://placehold.it/255x212" alt="avatar" class="img-fluid">
                        </a>
                    </div>
                    <div class="agent-details">
                        <h5><a href="team.html">John Pitarshon</a></h5>
                        <p>Creative Director</p>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="agent-2">
                    <div class="agent-photo">
                        <a href="team.html">
                            <img src="http://placehold.it/255x212" alt="avatar" class="img-fluid">
                        </a>
                    </div>
                    <div class="agent-details">
                        <h5><a href="team.html">Maria Blank</a></h5>
                        <p>Office Manager</p>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                <div class="agent-2">
                    <div class="agent-photo">
                        <a href="team.html">
                            <img src="http://placehold.it/255x212" alt="avatar" class="img-fluid">
                        </a>
                    </div>
                    <div class="agent-details">
                        <h5><a href="team.html">Karen Paran</a></h5>
                        <p>Support Manager</p>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div >
<!-- Agent end -->

<!-- Counters start -->
<div class="counters counters-2 overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-people-1"></i>
                    <h1 class="counter">254</h1>
                    <h5>Active Member</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-people"></i>
                    <h1 class="counter">130</h1>
                    <h5>Happy Clients</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-bars"></i>
                    <h1 class="counter">94</h1>
                    <h5>Total Projects</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters end -->

<!-- Blog start -->
<div class="blog content-area-2">
    <div class="container">
        <div class="main-title">
            <h1>News</h1>
            <p>Check out some recent news posts.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="blog-1">
                    <div class="blog-photo">
                        <img src="http://placehold.it/350x214" alt="blog" class="img-fluid">
                        <div class="profile-user">
                            <img src="http://placehold.it/45x45" alt="user">
                        </div>
                    </div>
                    <div class="detail">
                        <div class="date-box">
                            <span>27</span>Feb
                        </div>
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">Antony Toms</a></strong>
                                </li>
                                <li class="float-right mr-0"><a href="#"><i class="fa fa-commenting-o"></i></a>15</li>
                                <li class="float-right"><a href="#"><i class="flaticon-time"></i></a>5k</li>
                            </ul>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">Mattis magna neque finibus maximus.</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-none d-xl-block d-lg-block">
                <div class="blog-1">
                    <div class="blog-photo">
                        <img src="http://placehold.it/350x214" alt="blog" class="img-fluid">
                        <div class="profile-user">
                            <img src="http://placehold.it/45x45" alt="user">
                        </div>
                    </div>
                    <div class="detail">
                        <div class="date-box">
                            <span>27</span>Feb
                        </div>
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">Teseira Jeklin</a></strong>
                                </li>
                                <li class="float-right mr-0"><a href="#"><i class="fa fa-commenting-o"></i></a>15</li>
                                <li class="float-right"><a href="#"><i class="flaticon-time"></i></a>5k</li>
                            </ul>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">Attis magna ac neque finibus maximus.</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-1">
                    <div class="blog-photo">
                        <img src="http://placehold.it/350x214" alt="blog" class="img-fluid">
                        <div class="profile-user">
                            <img src="http://placehold.it/45x45" alt="user">
                        </div>
                    </div>
                    <div class="detail">
                        <div class="date-box">
                            <span>27</span>Feb
                        </div>
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">Teseira Jeklin</a></strong>
                                </li>
                                <li class="float-right mr-0"><a href="#"><i class="fa fa-commenting-o"></i></a>15</li>
                                <li class="float-right"><a href="#"><i class="flaticon-time"></i></a>5k</li>
                            </ul>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">Sapien eu sem consectetur amet scelerisque.</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog end -->

<!-- partner start -->
<div class="container partner">
    <div class="row">
        <div class="multi-carousel" data-items="1,3,5,6" data-slide="1" id="multiCarousel"  data-interval="1000">
            <div class="multi-carousel-inner">
                <div class="item">
                    <div class="pad15">
                        <img src="http://placehold.it/172x85" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <img src="http://placehold.it/172x85" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <img src="http://placehold.it/172x85" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <img src="http://placehold.it/172x85" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <img src="http://placehold.it/172x85" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <img src="http://placehold.it/172x85" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <img src="http://placehold.it/172x85" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <img src="http://placehold.it/172x85" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <img src="http://placehold.it/172x85" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <img src="http://placehold.it/172x85" alt="brand">
                    </div>
                </div>
            </div>
            <a class="multi-carousel-indicator leftLst" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="multi-carousel-indicator rightLst" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>
<!-- partner end -->

@stop
