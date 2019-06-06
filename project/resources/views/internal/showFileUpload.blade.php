@extends('layouts.new')
@section('title')
    SPS » Upload Case Reports
@endsection
@section('content')
    <div id='mainBanner'>
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi"
             style="background-image: url('{{asset('front')}}/img/tasks.jpg');height: 200px">
        </div>
        <!-- Sub banner end -->
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="margin-top: 20px">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('viewInvestigations')}}">Investigations</a></li>
                <li class="breadcrumb-item active">File Report</li>
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
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">
            <div class="project-sidebar-content">
                <!-- Project Overview -->
                <div class="card">
                    <div class="card-header mb-0">
                        <h4 class="card-title">Investigation Files Already Uploaded</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-content">
                            <div class="card-body  py-0 px-0">
                                <div class="list-group" style="margin: 20px">
                                    @foreach($investigation->files as $file)
                                        <div class="row">
                                            <div class="col-6">
                                                <a target="_blank"
                                                   href="{{route('showFile',['fileid' => $file->id])}}">
                                                    {{$file->filename}}
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <form method="post"
                                                      action="{{route('deleteInvestFile',['id' => $file->id])}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button style="color:red" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Upload a file report for this investigation <span
                                    style="color: darkblue">{{$investigation->title}}</span></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body" style="text-align: center">
                            <form method="post" action="{{route('uploadInvestFile',['id'=>$investigation->id])}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <label style="margin: 40px" for="report">File</label>
                                <input class="form-control-inline" type="file" accept="application/pdf"
                                       name="report"
                                       id="report" required autofocus>
                                <button type="submit" class="btn btn-primary">
                                    Upload
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop