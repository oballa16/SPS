@extends('inc.inside')

@section('title')
    SPS » {{$users->name}} {{$users->surname}}
@stop

@section('content')
    <div id='mainBanner'>
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="margin-top: 20px">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">User Profile</li>
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

    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-3"><!--left col-->
                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                         alt="avatar">
                </div>
                <hr>
                <br>
                @if($users->status == '1')
                    <h2 style="color:#ffae42;font-weight: bold;">Status: On Watch</h2>
                @elseif ($users->status=='2')
                    <h2 style="color:red;font-weight: bold">Status: Under Investigation</h2>
                @endif
                <hr>
                @if($users->role == 2)
                    <form method="post" action="{{route('sendMessage',['id' => $users->id])}}">
                        @csrf
                        <textarea name="message" id='message' placeholder="Enter message" required></textarea>
                        <button class="btn btn-primary" type="submit">Send</button>
                    </form>
                @endif
            </div><!--/col-3-->
            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>Employee name</h4></label>
                                <input type="text" class="form-control" name="name" id="name"
                                       value="{{$users->name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>Employee surname</h4></label>
                                <input type="text" class="form-control" name="surname" id="surname"
                                       value="{{$users->surname}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="last_name"><h4>Email</h4></label>
                                <input type="text" class="form-control" name="surname" id="surname"
                                       value="{{$users->email}}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="personal_no"><h4>Personal Number</h4></label>
                                <input type="text" class="form-control" name="personal_no" id="personal_no"
                                       value="{{$users->id}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="status"><h4>Work Position</h4></label>
                                <input type="text" class="form-control" name="status" id="status"
                                       value="
                                             @if($users->role == '1')
                                               Regular Employee
                                             @elseif($users->role == '2')
                                               Police Officer
                                             @elseif($users->role == '3')
                                               Chief Police Officer
                                             @else
                                               Internal Affairs Employee
                                              @endif" readonly>
                            </div>
                        </div>

                        <hr>

                    </div><!--/tab-pane-->
                </div><!--/tab-content-->

            </div><!--/col-9-->
        </div>
    </div>
    <div class="container-fluid">
        <div class="blog-section content-area-2">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Cases Involved</h1>
                    @if(count($users->cases)>0)
                        @foreach($users->cases as $case)
                            <div>
                                <div class="blog-1">
                                    <div class="detail">
                                        <div class="post-meta clearfix">
                                            <ul style="list-style: none">
                                                <li>
                                                    <strong>{{date('d M Y',strtotime($case->start_date))}}</strong>
                                                    -
                                                    <strong>{{date('d M Y',strtotime($case->end_date))}}</strong>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h3>
                                                    <a href="{{route('openCase',['id'=>$case->filedBy->id,
                                                            'caseid' => $case->id])}}">{{$case->title}} </a>
                                                </h3>
                                                <p>
                                                    {{substr($case->description,0,300)}}
                                                </p>
                                            </div>
                                            <div class="col-lg-3">
                                                <h4 style="margin-top: 40px">Leading
                                                    Officer: {{$case->filedBy->name}}</h4>
                                            </div>
                                            <div class="col-lg-3">
                                                <a style="margin-top: 30px" href="{{route('openCase',['id'=>$case->filedBy->id,
                                                            'caseid' => $case->id])}}"><i
                                                            class="fa fa-arrow-circle-right fa-4x"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else

                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(\Illuminate\Support\Facades\Auth::user()->role == 4)
        <div class="container-fluid" style="margin: 20px">
            <div class="row justify-content-center">
                <b>
                    <center>
                        <div class="card-header">ACTIONS</div>
                    </center>
                </b>
                <br><br>
                <center><a data-animation="animated fadeInUp delay-10s"
                           href="{{route('showEmailForm',['id' => $users->id])}}"
                           class="btn btn-lg btn-round btn-theme" style="width: 95%;">Send Email</a></center>
                <br><br>
                <center><a data-animation="animated fadeInUp delay-10s"
                           href="{{route('startInvestigation',['id' => $users->id])}}"
                           class="btn btn-lg btn-round btn-theme" style="width: 95%;">Start Investigation</a></center>

            </div>
        </div>
    @endif
@stop
