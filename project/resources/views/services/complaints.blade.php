@extends('inc.layout')
<!------ Include the above in your HEAD tag ---------->
@section('title')
    File a Complaint
@stop
<script src="{{asset('front')}}/js/jquery-2.2.0.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@section('content')

    <!-- Container -->
    <div class="container col-md-5" style="margin-top: 20px">

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('status') }}
            </div>
    @endif


    <!-- Begining of New Ticket Form -->
        <form class="form-horizontal col-md-12" method="POST" action="{{ route('complain') }}">
            @csrf

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-2 control-label">Title</label>

                <div class="col-md-12">
                    <input id="title" type="text" class="form-control" style="line-height: 40px;" name="title"
                           value="{{ old('title') }}" maxlength="30">
                    @if ($errors->has('title'))
                        <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                <label for="priority" class="col-md-4 control-label">Where would you like to address?</label>

                <div class="col-md-12">
                    <select id="institution" class="form-control" name="institution" style="height: 55px;">
                        <option value="police">State Police</option>
                        <option value="internal affairs">Internal Affairs</option>
                    </select>

                    @if ($errors->has('institution'))
                        <span class="help-block">
                    <strong>{{ $errors->first('priority') }}</strong>
                </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                <label for="priority" class="col-md-4 control-label">Priority</label>

                <div class="col-md-12">
                    <select id="priority" class="form-control" name="priority" style="height: 55px;">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>

                    @if ($errors->has('priority'))
                        <span class="help-block">
                    <strong>{{ $errors->first('priority') }}</strong>
                </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                <label for="message" class="col-md-4 control-label">Message</label>

                <div class="col-md-12">
                    <textarea rows="5" id="message" class="form-control"
                              name="message"></textarea> @if ($errors->has('message'))
                        <span class="help-block">
                    <strong>{{ $errors->first('message') }}</strong>
                </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="anonymous">
                    Anonymous
                </label>
                <a id="anonButton">
                    <input type="checkbox" checked data-toggle="toggle" value="0" name="anonymous">
                </a>
            </div>

            <div id='name' class="form-group{{ $errors->has('name') ? ' has-error' : '' }} hidden">
                <label for="name" class="col-md-2 control-label">Name</label>

                <div class="col-md-12">
                    <input id="name" type="text" class="form-control" style="line-height: 40px;" name="name"
                           value="{{ old('name') }}" maxlength="30">
                    @if ($errors->has('name'))
                        <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                    @endif
                </div>
            </div>

            <div id='surname' class="form-group{{ $errors->has('surname') ? ' has-error' : '' }} hidden">
                <label for="name" class="col-md-2 control-label">Surname</label>

                <div class="col-md-12">
                    <input id="surname" type="text" class="form-control" style="line-height: 40px;" name="surname"
                           value="{{ old('surname') }}" maxlength="30">
                    @if ($errors->has('surname'))
                        <span class="help-block">
                    <strong>{{ $errors->first('surname') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div id='email' class="form-group{{ $errors->has('email') ? ' has-error' : '' }} hidden">
                <label for="name" class="col-md-2 control-label">Email</label>

                <div class="col-md-12">
                    <input id="email" type="text" class="form-control" style="line-height: 40px;" name="email"
                           value="{{ old('email') }}" maxlength="30">
                    @if ($errors->has('email'))
                        <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-12 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" style="cursor: pointer">
                        {{ __('Send Complaint') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
    <!-- End of Container -->
@endsection
<script src="{{asset('front')}}/js/jquery-2.2.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#anonButton").on('click', function () {
            $("#name").toggleClass('hidden');
            $("#surname").toggleClass('hidden');
            $("#email").toggleClass('hidden');
        })
    })
</script>


