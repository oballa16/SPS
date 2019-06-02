@extends('layouts.new')

@section('title')
    SPS >> My Cases
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
                <li class="breadcrumb-item active">Cases</li>
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
                        <h2 class="title-1 m-b-25">My Cases</h2>
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cases as $case)
                                    <tr>

                                        <td>
                                            <a href="{{route('openCase',['id'=>$officer->id,'case_id' => $case->id])}}">{{$case->id}}</a>
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
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                            <div class="au-card-title"
                                 style="background-image:url('theme/images/bg-title-01.jpg');">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3>
                                    <a href="{{route('showTask',['id'=>$officer->id])}}" class="au-btn-plus">
                                        <i class="zmdi zmdi-plus"></i></a>
                                    <i class="zmdi zmdi-account-calendar"> Today's Date: </i>{{date('d-m-Y')}}</h3>
                            </div>
                            <div class="au-task js-list-load">
                                <div class="au-task__title">
                                    <p>Tasks for {{$officer->name}}</p>
                                </div>
                                <div class="au-task-list js-scrollbar3">
                                    @foreach($tasks as $task)
                                        <div class="au-task__item au-task__item--danger" style="overflow: hidden;">
                                            <div class="row">
                                                <div class="col-9">
                                                    <div class="au-task__item-inner">
                                                        <h5 class="task">
                                                            Task: {{$task->title}}
                                                        </h5>
                                                        <ul style="list-style: none">
                                                            <li>
                                                                <span>
                                                                    Case: {{$task->caseRelated->title}}
                                                                </span>
                                                            </li>
                                                            <li><span>Date Assigned: {{$task->date}}</span>
                                                            </li>
                                                            <li><span>Employee: {{$task->employee->name}}</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div style="margin-top:30px">
                                                        <h5>
                                                            Status
                                                        </h5>
                                                        <span style="margin-top: 50px">{{$task->status}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                            <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3>
                                    <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
                            </div>
                            <div class="au-inbox-wrap js-inbox-wrap">
                                <div class="au-message js-list-load">
                                    <div class="au-message__noti">
                                        <p>You Have
                                            <span>{{count($messages)}}</span>
                                            new messages
                                        </p>
                                    </div>
                                    <div class="au-message-list">
                                        @foreach($messages as $message)
                                            <div class="au-message__item unread">
                                                <div class="au-message__item-inner">
                                                    <div class="au-message__item-text">
                                                        <div class="avatar-wrap">
                                                            <div class="avatar">
                                                                <img src="{{asset('front')}}/img/avatar.png"
                                                                     alt="John Smith">
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <h5 class="name">{{$message->subject}}</h5>
                                                            <p>{{$message->body}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="au-message__item-time">
                                                        <span>{{date('d M',strtotime($message->created_at))}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="au-chat">
                                    @foreach($messages as $message)
                                        <div class="au-chat__title">
                                            <div class="au-chat-info">
                                                <div class="avatar-wrap online">
                                                    <div class="avatar avatar--small">
                                                        <img src="{{asset('front')}}/img/avatar.png"
                                                             alt="John Smith">
                                                    </div>
                                                </div>
                                                <span class="nick">
                                                        <a>State Police System</a>
                                                    </span>
                                            </div>
                                        </div>
                                        <div class="au-chat__content">
                                            <div class="recei-mess-wrap">
                                                <span class="mess-time">12 Min ago</span>
                                                <div class="recei-mess__inner">
                                                    <div class="avatar avatar--tiny">
                                                        <img src="{{asset('front')}}/img/avatar.png"
                                                             alt="John Smith">
                                                    </div>
                                                    <div class="recei-mess-list">
                                                        <div class="recei-mess">{{$message->body}}
                                                        </div>
                                                    </div>
                                                </div>
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
@stop
<!-- end document-->