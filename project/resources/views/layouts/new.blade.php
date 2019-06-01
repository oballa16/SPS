<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>@yield('title')</title>

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
    <script src="{{asset('theme')}}/vendor/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


    <!-- Main CSS-->
    <link href="{{asset('theme')}}/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">
    <div id="app" class="wrapper">
        {{-- My Sidebar--}}
        <div id="content">
            {{----}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    {{--<button type="button" id="sidebarCollapse" class="btn btn-info">--}}
                        {{--<i class="fas fa-align-left"></i>--}}
                        {{--<span>Open Sidebar</span>--}}
                    {{--</button>--}}
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
        </div>
    </div>
    @yield('content')

</div>
<!-- Jquery JS-->


{{--<div class="modal" id="modalTaskForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"--}}
{{--aria-hidden="true">--}}
{{--<div class="modal-dialog" role="document">--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header text-center">--}}
{{--<h4 class="modal-title w-100 font-weight-bold">Tasks</h4>--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--<span aria-hidden="true">&times;</span>--}}
{{--</button>--}}
{{--</div>--}}
{{--<div class="modal-body mx-3">--}}
{{--<div class="md-form mb-5">--}}
{{--<form action="{{route('addTask',['id'=>\Illuminate\Support\Facades\Auth::user()->id])}}"--}}
{{--method="post">--}}
{{--@csrf--}}
{{--<div class="form-group">--}}
{{--<label for="title">Title</label>--}}
{{--<input type="text" id='title' name='title' value="{{old('title')}}" required autofocus>--}}
{{--@if ($errors->has('title'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('title') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="description">Description</label>--}}
{{--<textarea name="description" id="description" required--}}
{{--autofocus>{{old('description')}}</textarea>--}}
{{--@if ($errors->has('description'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('description') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--<div class="form-group{{ $errors->has('case') ? ' has-error' : '' }}">--}}
{{--<label for="case" class="col-md-4 control-label">Case Number</label>--}}
{{--<div class="col-md-12">--}}
{{--<select id="case" class="form-control" name="case"--}}
{{--style="height: 55px;" required autofocus>--}}
{{--@foreach($cases as $case)--}}
{{--<option value="{{$case->id}}">{{$case->title}}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--@if ($errors->has('case'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('case') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group{{ $errors->has('employee') ? ' has-error' : '' }}">--}}
{{--<label for="case" class="col-md-4 control-label">Employee</label>--}}
{{--<div class="col-md-12">--}}
{{--<select id="employee" class="form-control" name="employee"--}}
{{--style="height: 55px;" required autofocus>--}}
{{--@foreach($employees as $employee)--}}
{{--<option value="{{$employee->id}}">{{$employee->name}}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--@if ($errors->has('employee'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('employee') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}
{{--<button type='submit'--}}
{{--class='btn btn-primary'>--}}
{{--Add--}}
{{--</button>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

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
<script src="{{asset('theme')}}/vendor/select2/select2.min.js"></script>
<!-- Main JS-->
<script src="{{asset('theme')}}/js/main.js"></script>

</body>

</html>
