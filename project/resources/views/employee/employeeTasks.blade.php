@extends('layouts.new')
@section('title')
    SPS » Employee Tasks
@endsection
@section('content')
    <div id='mainBanner'>
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi"
             style="background-image: url('{{asset('front')}}/img/police.jpg');height: 300px;">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>Add Tickets</h1>
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
                <li class="breadcrumb-item active">Tasks</li>
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
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5" style="margin-left: 25px">All Tasks</h3>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                    <tr>
                        <th>task id</th>
                        <th>date</th>
                        <th>title</th>
                        <th>description</th>
                        <th>Case</th>
                        <th>Officer</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr class="tr-shadow">
                            <td>{{$task->id}}</td>
                            <td>
                                <span class="block-email">{{$task->date}}</span>
                            </td>
                            <td> {{$task->title}}</td>
                            <td class="desc">{{substr($task->description,0,40)}}</td>
                            <td>{{$task->caseRelated->title}}</td>
                            <td>{{$task->officer->name}}</td>
                            <td>
                                @if($task->status == 'Open')
                                    <span class="status--denied">Open</span>
                                @else
                                    <span class="status--process">Closed</span>
                                @endif
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <a href="{{route('showFileUpload',['id'=>$task->id])}}">
                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="Upload File Report">
                                            <i class="zmdi zmdi-upload"></i>
                                        </button>
                                    </a>
                                    @if($task->status == 'Open')
                                        <form method="post" action="{{route('completeTask',['id'=>$task->id])}}">
                                            @method('PATCH')
                                            @csrf
                                            <button class="item" type="submit" data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Finish">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>

@endsection