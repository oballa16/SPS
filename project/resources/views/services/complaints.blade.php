@extends('inc.layout')
<!------ Include the above in your HEAD tag ---------->
@section('title')
    File a Complaint
@stop
@section('content')

    <!-- Container -->
    <div class="container col-md-5 ">
        <!-- Boostrap Grid -->
        <!-- Heading -->
    @include('inc.flash')


    <!-- Begining of New Ticket Form -->
        <form class="form-horizontal col-md-12"  method="POST" action="{{ route('fileComplaint') }}">
            @csrf

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-2 control-label">Title</label>

                <div class="col-md-12">
                    <input id="title" type="text" class="form-control" style="line-height: 40px;" name="title" value="{{ old('title') }}" maxlength="30"> @if ($errors->has('title'))
                        <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                <label for="priority" class="col-md-4 control-label">Where would you like to address?</label>

                <div class="col-md-12">
                    <select id="priority" type="" class="form-control" name="priority" style="height: 55px;">
                        <option value="">Select Department</option>
                        <option value="low">State Police</option>
                        <option value="medium">Internal Affairs</option>
                    </select>

                    @if ($errors->has('priority'))
                        <span class="help-block">
                    <strong>{{ $errors->first('priority') }}</strong>
                </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                <label for="priority" class="col-md-4 control-label">Priority</label>

                <div class="col-md-12">
                    <select id="priority" type="" class="form-control" name="priority" style="height: 55px;">
                        <option value="">Select Priority</option>
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
                    <textarea rows="5" id="message" class="form-control" name="message"></textarea> @if ($errors->has('message'))
                        <span class="help-block">
                    <strong>{{ $errors->first('message') }}</strong>
                </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 col-md-offset-4">
                    <button  type="submit"  class="btn btn-primary" style="cursor: pointer">
                        {{ __('Send Complaint') }}
                    </button>
                </div>

            </div>


        </form>

    </div>
    <!-- End of Container -->
@endsection


