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
                                <p data-animation="animated fadeInUp delay-10s">Welcome to the State Police's Online
                                    system.</p>
                                <a data-animation="animated fadeInUp delay-10s" href="/login"
                                   class="btn btn-lg btn-round btn-theme">Login</a>
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
                        <p>“Garantimi i një mjedisi të sigurtë për komunitetin nëpërmjet policimit me standartet më të
                            larta të performancës, krijimit të një kulture bashkëkohore manaxhimi dhe të mbështetur
                            meinfrastrukturën më të përparuar”</p>
                        <ul>
                            <li><i class="flaticon-up-arrow"></i>“Së bashku për një komunitet më të sigurt”</li>
                            <li><i class="flaticon-building"></i>Synimi strategjik aftagjatë i Policisë së Shtetit është
                                krijimi i një mjedisi sa më të sigurt për shoqërinë shqiptare, i cili do të sjellë
                                përmirësim në cilësinë e jetës së qytetarëve duke e bërë Shqipërinë një vend të
                                dëshirueshëm për të punuar e jetuar.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 offset-lg-1">
                    <div class="managment-slider">
                        <div id="carouselExampleIndicators-managment" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators-managment" data-slide-to="0"
                                    class="active"></li>
                                <li data-target="#carouselExampleIndicators-managment" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators-managment" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 img-fluid" src="{{asset('front')}}/img/policia.jpg"
                                         alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-fluid" src="{{asset('front')}}/img/policia2.jpg"
                                         alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-fluid" src="{{asset('front')}}/img/fbi.jpg"
                                         alt=" Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                               data-slide="next">
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
                        <img src="https://banner2.kisspng.com/20180420/wpw/kisspng-help-desk-issue-tracking-system-service-ticket-vector-movie-tickets-5ad9c579309040.8611790915242213051989.jpg"
                             width="100px" height="80px">
                        <div class="media-body"><a data-animation="animated fadeInUp delay-10s"
                                                   href="{{route('checkTickets')}}"
                            >
                                <h5>Check Your Tickets</h5>
                                <p>See if there are any parking tickets that you are not aware of</p></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="media services-info">
                        <img src="https://image.flaticon.com/icons/png/512/869/869409.png" width="100px" height="100px">
                        <div class="media-body"><a data-animation="animated fadeInUp delay-10s"
                                                   href="{{route('listWantedPeople')}}">
                                <h5>Stay safe at anytime</h5>
                                <p>Check all the list of wanted people in our country located in our database</p></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="media services-info">
                        <img src="http://cdn.onlinewebfonts.com/svg/img_299397.png" width="100px" height="100px">
                        <div class="media-body"><a data-animation="animated fadeInUp delay-10s"
                                                   href="{{route('fileComplaint')}}">
                                <h5>File a Complaint</h5>
                                <p>For every irregularity or corruption case, please send us your complaint</p></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="media services-info">
                        <img src="https://www.pngfind.com/pngs/m/114-1147878_location-poi-pin-marker-position-red-map-google.png"
                             width="100px" height="100px">
                        <div class="media-body"><a data-animation="animated fadeInUp delay-10s"
                                                   href="{{route('searchPatrols')}}">
                                <h5 class="mt-0">Search for Patrols nearby</h5>
                                <p>Check the map for patrols nearby you</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- services end -->
@stop
