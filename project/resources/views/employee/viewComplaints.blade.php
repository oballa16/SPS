@extends('inc.inside')
@section('title')
    SPS » View Complaints
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
    <div class="container card" style="margin-bottom: 40px">
        <div class="col-md-12 col-md-offset-1 card-body">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (count($complaints) == 0)
                        <p>There are currently no complaints.</p>
                    @else
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
                                        <a href="{{ route('complaint',['id' => $complaint->id]) }}">
                                            {{ $complaint->id }}
                                        </a>
                                    </td>
                                    <td>{{ $complaint->title }}</td>

                                    <td>{{ date('d-m-Y',strtotime($complaint->created_at))}}</td>
                                    <td>
                                        @if ($complaint->status === 'Open')
                                            <span class="label label-success text-success">{{ $complaint->status }}</span>
                                        @else
                                            <span class="label label-danger text-danger">{{ $complaint->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('complaint',['id'=>$complaint->id])}}" class="btn btn-sm"
                                           style="background:#2737A6;color:white">Comment</a>
                                    </td>
                                    <td>
                                        @if($complaint->status == 'Open')
                                            <form action="{{ route('closeComplaint',['id'=>$complaint->id])}}"
                                                  method="POST">
                                                @csrf
                                                @method('patch')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        style="font-weight:bold;cursor:pointer;">Close
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection