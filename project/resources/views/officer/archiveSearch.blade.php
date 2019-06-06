@extends('layouts.new')

@section('title')
    SPS » Archive Search
@stop


@section('content')
    <div id='mainBanner' style="margin-top: -30px">
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi"
             style="height:300px;background-image: url('{{asset('front')}}/img/police.jpg')">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>Cases</h1>
                </div>
            </div>
        </div>
        <!-- Sub banner end -->
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="margin-top: 20px">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Archive</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        @if (session('info'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('info') }}
            </div>
        @endif
    </div>
    <div class="main-content" style="margin-top: -50px">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <form method="get" action="{{route('searchArchive')}}" class="form-contact"
                      style="position:relative;left: 30%;top:40%;">
                    @csrf
                    <input type="text" name="search"
                           style="border: 3px solid darkblue; border-radius:30px;text-align: center;width: 400px"
                           class="form-control-lg" placeholder="Enter keywords">
                    <i class="fas fa-search fa-2x"></i>
                </form>
            </div>
        </div>


    </div>
@stop
<!-- end document-->