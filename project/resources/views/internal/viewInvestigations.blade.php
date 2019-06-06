@extends('layouts.new')
@section('title')
    SPS » View All Investigations
@endsection
@section('content')
    <div id='mainBanner' style="margin-top: -30px">
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi"
             style="height:300px;background-image: url('{{asset('front')}}/img/police.jpg')">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>Investigations</h1>
                </div>
            </div>
        </div>
        <!-- Sub banner end -->
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="margin-top: 20px">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Investigations</a>
                </li>
                <li class="breadcrumb-item active">{{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->surname}}</li>
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
                        <h2 class="title-1 m-b-25">All investigations</h2>
                        {{--<a style="margin:10px;" class="btn btn-primary" href="{{route('addCase')}}">Add a new case</a>--}}
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>Investigation ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Employee under investigation</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($investigations as $investigation)
                                    <tr>
                                        <td>{{$investigation->id}}</td>
                                        <td>{{$investigation->title}}</td>
                                        <td>{{substr($investigation->description,0,40)}}</td>
                                        @if($investigation->category == 1)
                                            <td><i class="zmdi zmdi-money"></i> Corruption</td>
                                        @elseif($investigation->category == 2)
                                            <td><i class="zmdi zmdi-account-o"></i> Inside Jobs</td>
                                        @elseif($investigation->category == 3)
                                            <td><i class="zmdi zmdi-home"></i> Illegal Building</td>
                                        @elseif($investigation->category == 4)
                                            <td><i class="zmdi zmdi-email-open"></i> Citizen Complaints</td>
                                        @else
                                            <td>Other</td>
                                        @endif

                                        <td>{{$investigation->emp->name}} {{$investigation->emp->surname}}</td>
                                        @if($investigation->status == 0)
                                            <td>Open</td>
                                        @else
                                            <td>Closed</td>
                                        @endif
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{route('showInvestFileUpload',['id'=>$investigation->id])}}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Upload File Report">
                                                        <i class="zmdi zmdi-upload"></i>
                                                    </button>
                                                </a>
                                                @if($investigation->status == 'open')
                                                    <form method="post"
                                                          action="{{route('closeInvestigation',['id'=>$investigation->id])}}">
                                                        @method('PATCH')
                                                        @csrf
                                                        <button class="item" type="submit" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Close Investigation">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{route('suspendEmployee',['id'=>$investigation->id])}}">
                                                        <button class="item" type="submit" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Suspend employee">
                                                            <i class="far fa-id-card"></i>
                                                        </button>
                                                    </a>
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