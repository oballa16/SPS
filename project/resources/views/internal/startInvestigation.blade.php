@extends('layouts.new')

@section('title')
    SPS » Internal Affairs Investigation
@endsection

@section('content')
    <div id='mainBanner' style="margin-top: -30px">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="margin-top: 20px">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Cases</li>
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
    <center>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>Record Investigation</strong> File
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('saveInvestigation')}}" method="POST" enctype="multipart/form-data"
                          class="form-horizontal">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="empID" class=" form-control-label">EMPLOYEE ID</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="empID" name="empID" value="{{$user->id}}" class="form-control"
                                       readonly>
                                <small class="form-text text-muted">Employee's ID</small>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="empName" class=" form-control-label">Employee's Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="empName" name="empName" value="{{$user->name}}"
                                       class="form-control" readonly>
                                <small class="form-text text-muted">Enter the title for this investigation</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="title" class=" form-control-label">Investigation Title</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="title" name="title" placeholder="Text" class="form-control">
                                <small class="form-text text-muted">Enter the title for this investigation</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="description" class=" form-control-label">Description</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="description" rows="9"
                                          placeholder="Enter the description of the case..."
                                          class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Select</label>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="category" class=" form-control-label">Select Category</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="category" id="category" class="form-control-sm form-control">
                                        <option value="0">Please select</option>
                                        <option value="1">Corruption</option>
                                        <option value="2">Inside Jobs</option>
                                        <option value="3">Illegal Buildings</option>
                                        <option value="4">Citizen Complaints</option>
                                        <option value="5">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="files" class=" form-control-label">Multiple File
                                        input</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="files" name="files[]" multiple=""
                                           class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </center>
@endsection