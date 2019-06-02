@extends('layouts.app')

@section('title')
    Dashboard
@stop
@section('content')
    @if (session('status'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{\Illuminate\Support\Facades\Session::forget('status')}}
                                {{\Illuminate\Support\Facades\Session::save()}}
                            </div>
                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div id="content-wrapper" style="margin-top: 20px">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-folder-open"></i>
                            </div>
                            <div class="mr-5">Cases</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1"
                           href="{{route('viewCases',['id' => \Illuminate\Support\Facades\Auth::user()->id])}}">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-archive"></i>
                            </div>
                            <div class="mr-5">Archive</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('archive')}}">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-database"></i>
                            </div>
                            <div class="mr-5">Citizen Lookup</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('citizenLookup')}}">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-database"></i>
                            </div>
                            <div class="mr-5">Complaints</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('viewComplaints')}}">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
