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
                    <h1>Task</h1>
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
                <li class="breadcrumb-item">
                    <a href="{{route('tasks')}}">Tasks</a>
                </li>
                <li class="breadcrumb-item active">{{$task->title}}</li>
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
            <div class="sidebar-detached sidebar-right">
                <div class="sidebar">
                    <div class="project-sidebar-content">
                        <!-- Project Overview -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{$task->title}}</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p>{{$task->description}}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Project Users -->
                        <div class="card">
                            <div class="card-header mb-0">
                                <h4 class="card-title">Task Files</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-content">
                                    <div class="card-body  py-0 px-0">
                                        <div class="list-group">
                                            @foreach($task->files as $file)
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
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
@stop