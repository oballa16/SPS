@extends('layouts.new')

@section('title')
    SPS » My Cases
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
                                    <td>{{$case->id}}</td>
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
                                        <div class="au-task__item au-task__item--danger">
                                            <div class="au-task__item-inner">
                                                <h5 class="task">
                                                    <a href="#">{{$task->title}}</a>
                                                </h5>
                                                <span class="time">Date Assigned: {{$task->date}}</span>
                                                <span>{{$task->employee->name}}</span>
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
                                <button class="au-btn-plus">
                                    <i class="zmdi zmdi-plus"></i>
                                </button>
                            </div>
                            <div class="au-inbox-wrap js-inbox-wrap">
                                <div class="au-message js-list-load">
                                    <div class="au-message__noti">
                                        <p>You Have
                                            <span>2</span>

                                            new messages
                                        </p>
                                    </div>
                                    <div class="au-message-list">
                                        <div class="au-message__item unread">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap">
                                                        <div class="avatar">
                                                            <img src="{{asset('theme')}}/images/icon/avatar-02.jpg"
                                                                 alt="John Smith">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">John Smith</h5>
                                                        <p>Have sent a photo</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>12 Min ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-message__item unread">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap online">
                                                        <div class="avatar">
                                                            <img src="{{asset('theme')}}/images/icon/avatar-03.jpg"
                                                                 alt="Nicholas Martinez">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">Nicholas Martinez</h5>
                                                        <p>You are now connected on message</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>11:00 PM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-message__item">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap online">
                                                        <div class="avatar">
                                                            <img src="{{asset('theme')}}/images/icon/avatar-04.jpg"
                                                                 alt="Michelle Sims">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">Michelle Sims</h5>
                                                        <p>Lorem ipsum dolor sit amet</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>Yesterday</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-message__item">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap">
                                                        <div class="avatar">
                                                            <img src="{{asset('theme')}}/images/icon/avatar-05.jpg"
                                                                 alt="Michelle Sims">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">Michelle Sims</h5>
                                                        <p>Purus feugiat finibus</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>Sunday</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-message__item js-load-item">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap online">
                                                        <div class="avatar">
                                                            <img src="{{asset('theme')}}/images/icon/avatar-04.jpg"
                                                                 alt="Michelle Sims">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">Michelle Sims</h5>
                                                        <p>Lorem ipsum dolor sit amet</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>Yesterday</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-message__item js-load-item">
                                            <div class="au-message__item-inner">
                                                <div class="au-message__item-text">
                                                    <div class="avatar-wrap">
                                                        <div class="avatar">
                                                            <img src="{{asset('theme')}}/images/icon/avatar-05.jpg"
                                                                 alt="Michelle Sims">
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <h5 class="name">Michelle Sims</h5>
                                                        <p>Purus feugiat finibus</p>
                                                    </div>
                                                </div>
                                                <div class="au-message__item-time">
                                                    <span>Sunday</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="au-message__footer">
                                        <button class="au-btn au-btn-load js-load-btn">load more</button>
                                    </div>
                                </div>
                                <div class="au-chat">
                                    <div class="au-chat__title">
                                        <div class="au-chat-info">
                                            <div class="avatar-wrap online">
                                                <div class="avatar avatar--small">
                                                    <img src="{{asset('theme')}}/images/icon/avatar-02.jpg"
                                                         alt="John Smith">
                                                </div>
                                            </div>
                                            <span class="nick">
                                                        <a href="#">John Smith</a>
                                                    </span>
                                        </div>
                                    </div>
                                    <div class="au-chat__content">
                                        <div class="recei-mess-wrap">
                                            <span class="mess-time">12 Min ago</span>
                                            <div class="recei-mess__inner">
                                                <div class="avatar avatar--tiny">
                                                    <img src="{{asset('theme')}}/images/icon/avatar-02.jpg"
                                                         alt="John Smith">
                                                </div>
                                                <div class="recei-mess-list">
                                                    <div class="recei-mess">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit non iaculis
                                                    </div>
                                                    <div class="recei-mess">Donec tempor, sapien ac viverra</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="send-mess-wrap">
                                            <span class="mess-time">30 Sec ago</span>
                                            <div class="send-mess__inner">
                                                <div class="send-mess-list">
                                                    <div class="send-mess">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit non iaculis
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="au-chat-textfield">
                                        <form class="au-form-icon">
                                            <input class="au-input au-input--full au-input--h65" type="text"
                                                   placeholder="Type a message">
                                            <button class="au-input-icon">
                                                <i class="zmdi zmdi-camera"></i>
                                            </button>
                                        </form>
                                    </div>
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