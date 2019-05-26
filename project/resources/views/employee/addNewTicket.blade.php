@extends('layouts.app')
<!------ Include the above in your HEAD tag ---------->
@section('title')
    SPS » Enter a new Ticket
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
        <form class="form-horizontal col-md-12" method="POST" action="{{ route('storeNewTicket') }}">
            @csrf

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-2 control-label">Ticket ID</label>

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
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="licenseNr" class="col-md-2 control-label">License Plate Number</label>

                <div class="col-md-12">
                    <input id="licenseNr" type="text" class="form-control" style="line-height: 40px;" name="licenseNr"
                           value="{{ old('licenseNr') }}" maxlength="30">
                    @if ($errors->has('licenseNr'))
                        <span class="help-block">
                    <strong>{{ $errors->first('licenseNr') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('chassisNr') ? ' has-error' : '' }}">
                <label for="chassisNr" class="col-md-2 control-label">Chassis Number</label>

                <div class="col-md-12">
                    <input id="chassisNr" type="text" class="form-control" style="line-height: 40px;" name="chassisNr"
                           value="{{ old('chassisNr') }}" maxlength="30">
                    @if ($errors->has('chassisNr'))
                        <span class="help-block">
                    <strong>{{ $errors->first('chassisNr') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label for="amount" class="col-md-2 control-label">Ticket Amount</label>

                <div class="col-md-12">
                    <input id="amount" type="number" class="form-control" style="line-height: 40px;" name="amount"
                           value="{{ old('amount') }}" maxlength="30">
                    @if ($errors->has('amount'))
                        <span class="help-block">
                    <strong>{{ $errors->first('amount') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="col-md-2 control-label">Ticket Description</label>

                <div class="col-md-12">
                    <input id="description" type="text" class="form-control" style="line-height: 40px;" name="description"
                           value="{{ old('description') }}" maxlength="30">
                    @if ($errors->has('desc'))
                        <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" style="cursor: pointer">
                        {{ __('Upload Ticket') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
    <!-- End of Container -->
@endsection



