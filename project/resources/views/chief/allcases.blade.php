@extends('layouts.new')

@section('title')
    SPS » All Cases
@stop


@section('content')
    <div id='mainBanner' style="margin-top: -30px">
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi"
             style="height:300px;background-image: url('{{asset('front')}}/img/police.jpg')">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>All Cases</h1>
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
                <li class="breadcrumb-item active">All Cases</li>
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
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">All Cases</h2>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>Case ID</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Title</th>
                                    <th>Place</th>
                                    <th>Officer</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cases as $case)
                                    <tr>

                                        <td>
                                            <a href="{{route('openCase',['id'=>$case->filedBy->id,'case_id' => $case->id])}}">{{$case->id}}</a>
                                        </td>
                                        <td>{{$case->start_date}}</td>
                                        <td>{{$case->end_date}}</td>
                                        @if($case->status == 'open')
                                            <td>
                                                <span style="color:red;border: 3px red solid;border-radius: 4px;">{{strtoupper($case->status)}}</span>
                                            </td>
                                        @else
                                            <td>{{$case->status}}</td>
                                        @endif
                                        <td>{{$case->title}}</td>
                                        <td>{{$case->place}}</td>
                                        <td>{{$case->filedBy->name}} {{$case->filedBy->surname}} </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{route('showCaseFileUpload',['id'=>$case->id])}}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Upload File Report">
                                                        <i class="zmdi zmdi-upload"></i>
                                                    </button>
                                                </a>
                                                @if($case->status == 'open')
                                                    <a href="{{route('showEditForm',['id' => $case->id])}}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                                title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                @endif
                                                <a href="{{route('showPeopleForm',['id'=>$case->id])}}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Add people">
                                                        <i class="zmdi zmdi-file-add"></i>
                                                    </button>
                                                </a>
                                                @if($case->status == 'open')
                                                    <form method="post"
                                                          action="{{route('closeCase',['id'=>$case->id])}}">
                                                        @method('PATCH')
                                                        @csrf
                                                        <button class="item" type="submit" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Close Case">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
<!-- end document-->