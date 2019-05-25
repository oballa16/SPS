@extends('inc.layout')
<!------ Include the above in your HEAD tag ---------->
@section('title')
    SPS » Most Wanted People
@stop


@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi" style="background-image: url('{{asset('front')}}/img/services.jpg')">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Services</h1>
                <ul class="breadcrumbs">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('services')}}">Services</a></li>
                    <li class="breadcrumb-item active">Most Wanted People</li>
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
                                <img src="{{asset('front')}}/img/profile_picture.jpeg" alt="wanted-people"
                                     class="img-fluid"
                                     style="width: 300px; height: 200px;">
                            </div>
                            <div class="detail">
                                <p>
                                    <strong>Name:</strong> {{$person->name}}
                                </p>
                                <p>
                                    <strong>Father's Name:</strong> {{$person->father_name}}
                                </p>
                                <p>
                                    <strong>Surname: </strong>{{$person->surname}}
                                </p>
                                <p>
                                    <strong>Birth date: </strong>{{date('d-m-Y',strtotime($person->birthdate))}}
                                </p>
                                <p>
                                    <strong>Gender: </strong>{{$person->gender}}
                                </p>
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