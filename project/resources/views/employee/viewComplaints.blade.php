@extends('inc.inside')
@section('title')
    SPS » View Complaints
@stop
<link href="{{ asset('css/create.css') }}" rel="stylesheet">
@section('content')

    <div id='mainBanner'>
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi" style="background-image: url('{{asset('front')}}/img/police.jpg')">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>Complaints by citizens</h1>
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
                <li class="breadcrumb-item active">Complaints by citizens</li>
            </ol>
        </div>
    </div>
    <div class="container card">
        <div class="col-md-12 col-md-offset-1 card-body">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (count($complaints) == 0)
                        <p>There are currently no complaints.</p>
                    @else
                        <table class="table table-responsive">
                            <thead style="background:#2737A6;color:white; font-size:17px; font-weight:bold;">
                            <tr>
                                <th>Complaint ID</th>
                                <th>Title</th>
                                <th>Date Opened</th>
                                <th>Status</th>
                                <th style="text-align:center" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($complaints as $complaint)
                                <tr>
                                    <td>
                                        <a href="{{ route('complaint',['id' => $complaint->id]) }}">
                                            {{ $complaint->id }}
                                        </a>
                                    </td>
                                    <td>{{ $complaint->title }}</td>

                                    <td>{{ date('d-m-Y',strtotime($complaint->created_at))}}</td>
                                    <td>
                                        @if ($complaint->status === 'Open')
                                            <span class="label label-success text-success">{{ $complaint->status }}</span>
                                        @else
                                            <span class="label label-danger text-danger">{{ $complaint->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('complaint',['id'=>$complaint->id])}}" class="btn btn-sm"
                                           style="background:#2737A6;color:white">Comment</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('closeComplaint',['id'=>$complaint->id])}}"
                                              method="POST">
                                            @csrf
                                            @method('patch')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    style="font-weight:bold;cursor:pointer;">Close
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>


    {{--<div class="modal fade" id="modalTaskShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"--}}
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
@endsection