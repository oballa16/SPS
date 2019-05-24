@extends('inc.layout')
<!------ Include the above in your HEAD tag ---------->
@section('title')
    Most Wanted People
@stop


@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi" style="background-image: url('{{asset('front')}}/img/services.jpg')">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Services</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('services')}}">Services</a></li>
                    <li class="active">Most Wanted People</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub banner end -->


    <div class="blog-section content-area-2">
        <div class="container">
            <div class="row">
                @foreach($people as $person)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="blog-1" style="width: 300px">
                            <div class="blog-photo">
                                <img src="http://placehold.it/45x45" alt="wanted-people" class="img-fluid"
                                     style="width: 300px; height: 200px;">
                            </div>
                            <div class="detail">
                                <h3>
                                    {{$person->name}} {{$person->surname}}
                                </h3>
                                <h4>
                                    {{date('d-m-Y',strtotime($person->birthdate))}}
                                </h4>
                                <h4>
                                    {{$person->gender}}
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="text-align: center">
                {{ $people->links()}}
            </div>
        </div>

    </div>

@stop