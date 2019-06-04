@extends('inc.layout')
@section('title')
SPS » News
@stop
@section('content')
    <div id='mainBanner'>
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi" style="background-image: url('{{asset('front')}}/img/police.jpg');height:300px;">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>SPS NEWS</h1>
                </div>
            </div>
        </div>
        <!-- Sub banner end -->
    </div>
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
@stop