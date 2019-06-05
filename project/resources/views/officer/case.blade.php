@extends ('layouts.new')

@section('title')
    SPS » Case
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
                @if(\Illuminate\Support\Facades\Auth::user()->role==3)
                    <li class="breadcrumb-item"><a
                                href="{{route('viewAllCases')}}">
                            Cases</a>
                    </li>
                    <li class="breadcrumb-item active">{{$case->title}}</li>
                @elseif(Auth::user()->role == 2)
                    <li class="breadcrumb-item"><a
                                href="{{route('viewCases',['id'=>\Illuminate\Support\Facades\Auth::user()->id])}}">
                            Cases</a>
                    </li>
                    <li class="breadcrumb-item active">{{$case->title}}</li>
                @else
                    <li class="breadcrumb-item active">{{$case->title}}</li>
                @endif
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


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-detached content-left">
                <div class="content-body">
                    <section class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-head">
                                    <div class="card-header">
                                        <h4 class="card-title">{{$case->title}}</h4>
                                        <div class="heading-elements">
                                            <span class="badge badge-default badge-warning">{{$case->place}}</span>
                                        </div>
                                    </div>
                                    <div class="px-1">
                                        <ul class="list-inline list-inline-pipe text-center p-1 border-bottom-grey border-bottom-lighten-3">
                                            <li>Case Leader: <span class="text-muted">{{$case->filedBy->name}}</span>
                                            </li>
                                            <li>Start Date: <span
                                                        class="text-muted">{{date('d M Y',strtotime($case->start_date))}}</span>
                                            </li>
                                            <li>Due on: <span
                                                        class="text-muted">{{date('d M Y',strtotime($case->end_date))}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- project-info -->
                                <div id="project-info" class="card-body row">
                                    <div class="project-info-count col-lg-4 col-md-12">
                                        <div class="project-info-icon">
                                            <h2>12</h2>
                                            <div class="project-info-sub-icon">
                                                <span class="fa fa-user"></span>
                                            </div>
                                        </div>
                                        <div class="project-info-text pt-1">
                                            <h5>Cases Employees</h5>
                                        </div>
                                    </div>
                                    <div class="project-info-count col-lg-4 col-md-12">
                                        <div class="project-info-icon">
                                            <h2>{{count($case->tasks)}}</h2>
                                            <div class="project-info-sub-icon">
                                                <span class="fa fa-calendar"></span>
                                            </div>
                                        </div>
                                        <div class="project-info-text pt-1">
                                            <h5>Case Tasks</h5>
                                        </div>
                                    </div>
                                    <div class="project-info-count col-lg-4 col-md-12">
                                        <div class="project-info-icon">
                                            <h2>{{count($case->people)}}</h2>
                                            <div class="project-info-sub-icon">
                                                <span class="fa fa-bug"></span>
                                            </div>
                                        </div>
                                        <div class="project-info-text pt-1">
                                            <h5>Involved people</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Task Progress -->
                    <section class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-head">
                                    <div class="card-header">
                                        <h4 class="card-title">Task Progress</h4>
                                        <div class="heading-elements">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="list-inline mb-0">
                                            @for($i=0;$i<sizeof($case->tasks);$i++)
                                                <li>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            {{$i+1}}. {{$case->tasks[$i]->title}}
                                                        </div>
                                                        <div class="col-3">
                                                            @if($case->tasks[$i]->status == 'Open')
                                                                <span>Ongoing <i
                                                                            class="fas fa-times"></i></span>
                                                            @else
                                                                <span>Completed
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                            @endif
                                                        </div>
                                                        <div class="col-2">
                                                            {{$case->tasks[$i]->employee->name}}
                                                        </div>
                                                        <div class="col-4">

                                                            @if(count($case->tasks[$i]->files) > 0 )
                                                                <i class="far fa-file-pdf"></i>
                                                                <a target="_blank"
                                                                   href="{{route('showFile',['fileid' => $case->tasks[$i]->files[0]->id])}}">{{$case->tasks[$i]->files[0]->filename}}</a>
                                                            @else
                                                                No Report Yet
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Task Progress -->
                        <!--/ Bug Progress -->
                    </section>
                </div>
            </div>
            <div class="sidebar-detached sidebar-right">
                <div class="sidebar">
                    <div class="project-sidebar-content">
                        <!-- Project Overview -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Case Overview</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p>{{$case->description}}</p>
                                </div>
                            </div>
                        </div>
                        <!--/ Project Overview -->
                        <div class="card">
                            <div class="card-header mb-0">
                                <h4 class="card-title">People Involved</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-content">
                                    <div class="card-body  py-0 px-0">
                                        <div class="list-group">
                                            @foreach($case->people as $person)
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <a style="margin: 20px;" target="_blank"
                                                           href="{{route('openProfile',['id' => $person->id])}}">{{
                                                           $person->name}} {{$person->surname}}</a>
                                                    </div>
                                                    <div class="col-lg-3" style="margin-top: 20px">
                                                        {{date('d M Y',strtotime($person->created_at))}}
                                                    </div>
                                                    <div class="col-lg-3" style="margin-top: 15px">
                                                        <a target="_blank" class="btn btn-primary"
                                                           href="{{route('openProfile',['id' => $person->id])}}">Open
                                                            Profile</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Project Users -->
                        <div class="card">
                            <div class="card-header mb-0">
                                <h4 class="card-title">Case Files</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-content">
                                    <div class="card-body  py-0 px-0">
                                        <div class="list-group">
                                            @foreach($files as $file)
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a style="margin: 20px;" target="_blank"
                                                           href="{{route('showFile',['fileid' => $file->id])}}">{{$file->filename}}</a>
                                                    </div>
                                                    <div class="col-3" style="margin: 20px">
                                                        {{$file->employee->name}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('zipFile',['id'=>$case->filedBy->id,'caseid'=>$case->id])}}"
                                   class="btn btn-primary" style="margin: 20px;background-color: darkblue">Zip and
                                    download
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
@stop