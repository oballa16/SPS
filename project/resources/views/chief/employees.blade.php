@extends('layouts.new')

@section('title')
    SPS » My Employees
@stop
@section('content')
    <div id='mainBanner' style="margin-top: -30px">
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi"
             style="height:300px;background-image: url('{{asset('front')}}/img/police.jpg')">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>Employees</h1>
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
                <li class="breadcrumb-item active">Employees</li>
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
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Position</th>
                                    <th>No. of total tasks</th>
                                    <th>Tasks completed</th>
                                    <th>Performance</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr style="text-align: center;">
                                        <td>{{$employee->id}}</td>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->surname}}</td>
                                        <td>
                                            Police Employee
                                        </td>
                                        <td>
                                            {{count($employee->EmployeeTasks)}}
                                        </td>
                                        <td>
                                            @php(
                                           $completed2 = $employee->EmployeeTasks->filter(function ($item) { return $item->status == 'Completed';})->count()
                                            )
                                            {{ $completed2 }}
                                        </td>
                                        <td>
                                            <div class="progress-wrap progress"
                                                 data-progress-percent="{{$completed2/(count($employee->EmployeeTasks)) * 100}}">
                                                <div class="progress-bar progress"></div>
                                            </div>
                                        </td>
                                        <input type="number" hidden id="notcompleted" value="{{count($notcompleted)}}">
                                        <input type="number" hidden id="completed" value="{{count($completed)}}">
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <h3 class="title-2 m-b-40">Tasks Completed</h3>
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        // on page load...
        moveProgressBar();
        // on browser resize...
        $(window).resize(function () {
            moveProgressBar();
        });

        // SIGNATURE PROGRESS
        function moveProgressBar() {
            console.log("moveProgressBar");
            var getPercent = ($('.progress-wrap').data('progress-percent') / 100);
            var getProgressWrapWidth = $('.progress-wrap').width();
            var progressTotal = getPercent * getProgressWrapWidth;
            var animationLength = 2500;

            // on page load, animate percentage bar to data percentage length
            // .stop() used to prevent animation queueing
            $('.progress-bar').stop().animate({
                left: progressTotal
            }, animationLength);
        }
    </script>

@stop
<!-- end document-->