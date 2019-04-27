@extends('inc.layout')
@extends('layouts.app')
@section('title')
    SPS >> Services
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Services List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Welcome to the State Police Services System
                    </div>
                    <div class="containsServices">
                        <button>Make a complaint</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop