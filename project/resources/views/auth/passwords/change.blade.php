@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Change Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('changePass') }}">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}"
                                   hidden>
                            <div class="form-group row">
                                <label for="old-password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                                <div class="col-md-6">
                                    <input id="old-password" type="password"
                                           class="form-control{{ $errors->has('old-password') ? ' is-invalid' : '' }}"
                                           name="old-password" value="{{ old('old-password') }}" required>

                                    @if ($errors->has('old-password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('old-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" value="{{ old('password') }}" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password"
                                           class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}"
                                           name="password-confirm" value="{{ old('password-confirm') }}" required>

                                    @if ($errors->has('password-confirm'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password-confirm') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
