@extends('inc.inside')

@section('title')
    SPS » {{$users->name}} {{$users->surname}}
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
                                       value="@if($users->role == '1')
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
