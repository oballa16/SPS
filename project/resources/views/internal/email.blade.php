@extends('inc.inside')

@section('title')
    SPS » Complaint
@stop
@section('content')

    <div id='mainBanner'>
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi"
             style="background-image: url('{{asset('front')}}/img/police.jpg');height:300px;">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>Complaints</h1>
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
                <li class="breadcrumb-item"><a href="{{route('viewComplaints')}}">Complaints</a></li>
                <li class="breadcrumb-item active">{{$complaint->title}}</li>
            </ol>
        </div>
    </div>

    <div class="container" style="margin-top: 40px">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name='name' id="name"
                   value="{{$user->name}}" required autofocus readonly>
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" class="form-control" name='surname' id="surname"
                   value="{{$user->surname}}" required autofocus readonly>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name='message' id="message"
                   value="{{$user->email}}" required autofocus readonly>
        </div>
        <form method="post" action="{{route('sendEmail',['id'=>$user->id])}}">
            @csrf
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name='subject' id="subject"
                       placeholder="Enter email subject"
                       value="{{old('subject')}}" autofocus>

                @if ($errors->has('subject'))
                    <span class="alert-danger">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="emailBody">Email Body</label>
                <textarea class="form-control" name='emailBody' id="emailBody"
                          placeholder="Enter email body"
                          autofocus>{{old('emailBody')}}</textarea>

                @if ($errors->has('emailBody'))
                    <span class="alert-danger">
                                        <strong>{{ $errors->first('emailBody') }}</strong>
                                    </span>
                @endif
            </div>

            <div>
                <button type="submit" class="btn btn-primary mybtn" style="margin-bottom: 100px">Submit
                </button>
            </div>
        </form>
    </div>
@stop
