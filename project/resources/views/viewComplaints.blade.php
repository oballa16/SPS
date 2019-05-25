@extends('inc.layout')
@section('title')
    View Complaints
@stop
<link href="{{ asset('css/create.css') }}" rel="stylesheet">
@section('content')

    <div id='mainBanner'>
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi" style="background-image: url('{{asset('front')}}/img/police.jpg')">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>Complaints by citizens</h1>
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
                <li class="breadcrumb-item active">Complaints by citizens</li>
            </ol>
        </div>
    </div>
    <div class="container card">
        <div class="col-md-12 col-md-offset-1 card-body">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if ($complaints->isEmpty())
                        <p>There are currently no complaints.</p>
                        @elseadd
                        <table class="table table-responsive">
                            <thead style="background:#2737A6;color:white; font-size:17px; font-weight:bold;">
                            <tr>
                                <th>Complaint ID</th>
                                <th>Title</th>
                                <th>Date Opened</th>
                                <th>Status</th>
                                <th style="text-align:center" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($complaints as $complaint)
                                <tr>
                                    <td>
                                        <a href="{{ url('services/'. $complaint->id) }}">
                                            {{ $complaint->id }}
                                        </a>
                                    </td>
                                    <td>{{ $complaint->title }}</td>
                                    <td>
                                        @if ($complaint->status === 'Open')
                                            <span class="label label-success text-success">{{ $complaint->status }}</span>
                                        @else
                                            <span class="label label-danger text-danger">{{ $complaint->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $complaints->created_at->format('F d, Y H:i') }}</td>
                                    <td>{{ $complaints->created_at->diffInHours($complaint->updated_at) }} hour (s)</td>
                                    <td>
                                        <a href="{{ url('services/' . $complaint->id) }}" class="btn btn-sm"
                                           style="background:#2737A6;color:white">Comment</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('' . $complaint->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    style="font-weight:bold">Close
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $complaints->render() }} @endif
                </div>
            </div>
        </div>
    </div>
@endsection