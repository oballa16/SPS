@extends('layouts.new')

@section('title')
    SPS >> Add task
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
                <li class="breadcrumb-item"><a href="{{route('viewCases',['id'=>$officer->id])}}">Cases</a></li>
                <li class="breadcrumb-item active">Task</li>
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
    <div class="card">
        <div class="card-header" style="text-align: center;;">
            <strong>Add a new Task</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{route('addTask',['id'=>\Illuminate\Support\Facades\Auth::user()->id])}}"
                  method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" id='title' name='title'
                           value="{{old('title')}}"
                           required
                           autofocus placeholder="Enter title of the task">
                    @if ($errors->has('title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="9" placeholder="Content..."
                              class="form-control">{{old('description')}}</textarea>

                    @if ($errors->has('description'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('case') ? ' has-error' : '' }}">
                    <label for="case" class="col-md-4 control-label">Case
                        Number</label>
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
                    <label for="case"
                           class="col-md-4 control-label">Employee</label>
                    <div class="col-md-12">
                        <select id="employee" class="form-control"
                                name="employee"
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
                <button type='submit'
                        class='btn btn-primary'>
                    Add
                </button>
            </form>
        </div>
    </div>
@stop