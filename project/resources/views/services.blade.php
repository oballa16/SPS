@extends('inc.layout')
@extends('layouts.app')
@section('title')
Services
@stop

@section('content')
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