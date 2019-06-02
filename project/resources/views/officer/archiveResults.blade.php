@extends('inc.layout')

@section('title')
    SPS » My Cases
@stop


@section('content')
    <div id='mainBanner' style="overflow: hidden">
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
    <div class="main-content" style="overflow: hidden">
        <div class="blog-section content-area-2">
            <div class="container-fluid">
                <form method="get" action="{{route('searchArchive')}}" class="form-contact"
                      style="position:relative;left: 30%;top:40%;">
                    @csrf
                    <input type="text" name="search"
                           style="border: 3px solid darkblue; border-radius:30px;text-align: center;width: 400px"
                           class="form-control-lg" placeholder="Enter keywords">
                    <i class="fa  fa-search fa-2x"></i>
                </form>
            </div>
            <div class="container-fluid">
                <div class="blog-section content-area-2">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            @if(count($cases)>0)
                                @foreach($cases as $case)
                                    <div>
                                        <div class="blog-1">
                                            <div class="detail">
                                                <div class="post-meta clearfix">
                                                    <ul style="list-style: none">
                                                        <li>
                                                            <strong>{{date('d M Y',strtotime($case->start_date))}}</strong>
                                                            -
                                                            <strong>{{date('d M Y',strtotime($case->end_date))}}</strong>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h3>
                                                            <a href="{{route('openCase',['id'=>$case->filedBy->id,
                                                            'caseid' => $case->id])}}">{{$case->title}} </a>
                                                        </h3>
                                                        <p>
                                                            {{substr($case->description,0,300)}}
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <h4 style="margin-top: 40px">Leading Officer: {{$case->filedBy->name}}</h4>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <a style="margin-top: 30px" href="{{route('openCase',['id'=>$case->filedBy->id,
                                                            'caseid' => $case->id])}}"><i
                                                                    class="fa fa-arrow-circle-right fa-4x"></i> </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@stop
<!-- end document-->