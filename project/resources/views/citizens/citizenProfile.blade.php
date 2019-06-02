@extends('inc.inside')

@section('title')
    SPS » {{$citizen->name}} {{$citizen->surname}}
@stop
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<hr>

@section('content')
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-3"><!--left col-->
                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                         alt="avatar">
                </div>
                <hr>
                <br>

                <ul class="list-group">
                    <li class="list-group-item text-left"><span
                                class="pull-left"><strong>Status: </strong></span>
                        @if($citizen->wanted==1)
                            Wanted
                        @else
                            Not Wanted
                        @endif
                    </li>
                    <li class="list-group-item text-left"><span
                                class="pull-left"><strong>Address: </strong></span>{{$citizen->address}}
                    </li>
                    <li class="list-group-item text-left"><span
                                class="pull-left"><strong>Mobile Phone: </strong></span>{{$citizen->mobile}}</li>
                    <li class="list-group-item text-left"><span
                                class="pull-left"><strong>Birth Place: </strong></span>{{$citizen->birthplace}}</li>
                </ul>

            </div><!--/col-3-->
            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>First name</h4></label>
                                <input type="text" class="form-control" name="name" id="name"
                                       value="{{$citizen->name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="last_name"><h4>Last name</h4></label>
                                <input type="text" class="form-control" name="surname" id="surname"
                                       value="{{$citizen->surname}}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="father_name"><h4>Father's Name</h4></label>
                                <input type="text" class="form-control" name="father_name" id="father_name"
                                       value="{{$citizen->father_name}}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mother_name"><h4>Mother's Name</h4></label>
                                <input type="text" class="form-control" name="mother_name" id="mother_name"
                                       value="{{$citizen->mother_name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="birthdate"><h4>Birth date</h4></label>
                                <input type="date" class="form-control" name="birthdate" id="birthdate"
                                       value="{{$citizen->birthdate}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="gender"><h4>Gender</h4></label>
                                <input type="text" class="form-control" id="gender" value="{{$citizen->gender}}"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="personal_no"><h4>Personal Number</h4></label>
                                <input type="text" class="form-control" name="personal_no" id="personal_no"
                                       value="{{$citizen->personal_no}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="status"><h4>Marital Status</h4></label>
                                <input type="text" class="form-control" name="status" id="status"
                                       value="{{$citizen->maritial_status}}" readonly>
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
                    @if(count($citizen->cases)>0)
                        @foreach($citizen->cases as $case)
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

    <script>
        $(document).ready(function () {


            var readURL = function (input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function () {
                readURL(this);
            });
        });</script>
@stop
