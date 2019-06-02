@extends('layouts.new')

@section('title')
    SPS » Edit Case
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
                <li class="breadcrumb-item"><a href="{{route('viewCases',['id'=>$case->filedBy->id])}}">Cases</a></li>
                <li class="breadcrumb-item active">{{$case->title}}</li>
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
            <strong>Edit a case</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{route('editCase',['id'=>$case->id])}}"
                  method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="title"></label>
                    <input class="form-control" type="text" id='title' name='title'
                           value="{{$case->title}}"
                           required
                           autofocus>
                    @if ($errors->has('title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="9" placeholder="Content..."
                              class="form-control" required
                              autofocus>{{$case->description}}</textarea>

                    @if ($errors->has('description'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input name="start_date" id="start_date" type="date"
                           class="form-control" required
                           autofocus value="{{$case->start_date}}">

                    @if ($errors->has('start_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('start_date') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input name="end_date" id="end_date" type="date"
                           class="form-control" value="{{$case->end_date}}" required
                           autofocus>

                    @if ($errors->has('end_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="place">Place</label>
                    <input name="place" id="place" type="text"
                           class="form-control" value="{{$case->place}}" required
                           autofocus>

                    @if ($errors->has('place'))
                        <span class="help-block">
                            <strong>{{ $errors->first('place') }}</strong>
                        </span>
                    @endif
                </div>

                <button type='submit'
                        class='btn btn-primary'>
                    Edit Case
                </button>
            </form>
        </div>
    </div>
@stop