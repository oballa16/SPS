@extends('inc.layout')
@section('title')
    SPS » News
@stop
@section('content')
    <div id='mainBanner'>
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi"
             style="background-image: url('{{asset('front')}}/img/police.jpg');height:300px;">
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
                <div class="col-lg-4 col-md-6 d-none d-xl-block d-lg-block">
                    <div class="blog-1">
                        <div class="blog-photo">
                            <img src="http://placehold.it/350x214" alt="blog" class="img-fluid">
                        </div>
                        <div class="detail">
                            <div class="date-box">
                                <span>13</span>May
                            </div>
                            <div class="post-meta clearfix">
                                <ul>
                                    <li>
                                        <strong>SPS</strong>
                                    </li>
                                    <li class="float-right mr-0"><i class="fa fa-commenting-o"></i>15</li>
                                    <li class="float-right"><i class="flaticon-time"></i>5k</li>
                                </ul>
                            </div>
                            <p>Më datë 13.05.2019, u arrestua në flagrancë shtetasi P.S., vjeç 19, banues në Tiranë,
                                pasi u kap duke drejtuar pa leje drejtimi, motorin tip “Vespa”.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-none d-xl-block d-lg-block">
                    <div class="blog-1">
                        <div class="blog-photo">
                            <img src="http://placehold.it/350x214" alt="blog" class="img-fluid">
                        </div>
                        <div class="detail">
                            <div class="date-box">
                                <span>14</span>May
                            </div>
                            <div class="post-meta clearfix">
                                <ul>
                                    <li>
                                        <strong>SPS</strong>
                                    </li>
                                    <li class="float-right mr-0"><i class="fa fa-commenting-o"></i>15</li>
                                    <li class="float-right"><i class="flaticon-time"></i>5k</li>
                                </ul>
                            </div>
                            <p>Më datë 14.05.2019, u arrestua në flagrancë shtetasi V.D., vjeç 21, pasi mjeti tip “Opel”
                                të cilin ai drejtonte, dyshohet të jetë i vjedhur.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-none d-xl-block d-lg-block">
                    <div class="blog-1">
                        <div class="blog-photo">
                            <img src="http://placehold.it/350x214" alt="blog" class="img-fluid">
                        </div>
                        <div class="detail">
                            <div class="date-box">
                                <span>17</span>May
                            </div>
                            <div class="post-meta clearfix">
                                <ul>
                                    <li>
                                        <strong>SPS</strong>
                                    </li>
                                    <li class="float-right mr-0"><i class="fa fa-commenting-o"></i>15</li>
                                    <li class="float-right"><i class="flaticon-time"></i>5k</li>
                                </ul>
                            </div>
                            <p>Më datë 17.05.2019, u arrestua në flagrancë shtetasi A.D., vjeç 21, pasi dyshohet te ketë
                                qëlluar me çelës papagall në kokë një kalimtar të rastësishëm.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop