<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('theme')}}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet"
          media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('theme')}}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('theme')}}/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
          media="all">
    <link href="{{asset('theme')}}/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset('theme')}}/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('theme')}}/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div id="app" class="wrapper">
    {{-- My Sidebar--}}
    <div id="content">
        {{----}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Open Sidebar</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

    </div>
</div>
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
                                <i class="zmdi zmdi-account-calendar"> Today's Date: </i>{{date('d-m-Y')}}</h3>
                            <a href="" class="au-btn-plus" data-toggle="modal"
                               data-target="#modalTaskShow"> <i class="zmdi zmdi-plus"></i></a>
                        </div>
                        <div class="au-task js-list-load">
                            <div class="au-task__title">
                                <p>Tasks for {{$officer->name}}</p>
                            </div>
                            @foreach($tasks as $task)
                                <div class="au-task-list js-scrollbar3">
                                    <div class="au-task__item au-task__item--danger">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">{{$task->title}}</a>
                                            </h5>
                                            <span class="time">Date Assigned: {{$task->date}}</span>
                                            <span class=""></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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

<div class="modal fade" id="modalTaskShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Tasks</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <form action="{{route('addTask',['id'=>\Illuminate\Support\Facades\Auth::user()->id])}}"
                          method="post">
                        @csrf
                        <div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id='title' name='title' value="{{old('title')}}" required autofocus>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" required
                                          autofocus>{{old('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('case') ? ' has-error' : '' }}">
                                <label for="case" class="col-md-4 control-label">Case Number</label>
                                <div class="col-md-12">
                                    <select id="case" class="form-control" name="case"
                                            style="height: 55px;" required autofocus>
                                        @foreach($cases as $case)
                                            <option value="{{$case->id}}">{{$case->title}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('case'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('case') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('employee') ? ' has-error' : '' }}">
                                <label for="case" class="col-md-4 control-label">Employee</label>
                                <div class="col-md-12">
                                    <select id="employee" class="form-control" name="employee"
                                            style="height: 55px;" required autofocus>
                                        @foreach($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('employee'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('employee') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button style="cursor: pointer;margin-bottom: 5px" type='submit'
                                    class='btn btn-primary'>
                                Edit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="{{asset('theme')}}/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="{{asset('theme')}}/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="{{asset('theme')}}/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="{{asset('theme')}}/vendor/slick/slick.min.js">
</script>
<script src="{{asset('theme')}}/vendor/wow/wow.min.js"></script>
<script src="{{asset('theme')}}/vendor/animsition/animsition.min.js"></script>
<script src="{{asset('theme')}}/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="{{asset('theme')}}/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="{{asset('theme')}}/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="{{asset('theme')}}/vendor/circle-progress/circle-progress.min.js"></script>
<script src="{{asset('theme')}}/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{asset('theme')}}/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="{{asset('theme')}}/vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="{{asset('theme')}}/js/main.js"></script>

</body>

</html>
<!-- end document-->