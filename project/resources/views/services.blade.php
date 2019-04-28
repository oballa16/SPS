@extends('inc.layout')
@section('title')
Services
@stop

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Services</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li class="active">Services </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub banner end -->



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Services List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Welcome to the State Police Services System
                    </div>
                    <div class="containsServices">
                        <a data-animation="animated fadeInUp delay-10s" href="#" class="btn btn-lg btn-round btn-theme" style="width: 100%;">Check your tickets</a>
                        <br><br><a data-animation="animated fadeInUp delay-10s" href="#" class="btn btn-lg btn-round btn-theme" style="width: 100%;">List of wanted people</a>
                        <br><br><a data-animation="animated fadeInUp delay-10s" href="#" class="btn btn-lg btn-round btn-theme" style="width: 100%;">File a complaint</a>
                        <br><br><a data-animation="animated fadeInUp delay-10s" href="#" class="btn btn-lg btn-round btn-theme" style="width: 100%;">Search for patrols nearby</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop