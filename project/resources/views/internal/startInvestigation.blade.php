@section('title')
    SPS » Internat Affairs Investigation
    @endsection
@extends('layouts.app')
<!-- Fontfaces CSS-->
<link href="css/font-face.css" rel="stylesheet" media="all">
<link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

<!-- Bootstrap CSS-->
<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

<!-- Vendor CSS-->
<link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
<link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
<link href="vendor/wow/animate.css" rel="stylesheet" media="all">
<link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
<link href="vendor/slick/slick.css" rel="stylesheet" media="all">
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
<link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

<!-- Main CSS-->
<link href="css/theme.css" rel="stylesheet" media="all">
@section('content')
    <center>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Record Investigation</strong> File
        </div>
        <div class="card-body card-block">
            <form action="{{ route('saveInvestigation') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="title" class=" form-control-label">Investigation Title</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="title" name="text-input" placeholder="Text" class="form-control">
                        <small class="form-text text-muted">Enter the title for this investigation</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="description" class=" form-control-label">Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="textarea-input" id="description" rows="9" placeholder="Enter the description of the case..." class="form-control"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Select</label>
                    </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="selectSm" class=" form-control-label">Select Category</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
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
                        <label for="file-input" class=" form-control-label">Backup documents</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="file-input" class="form-control-file">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-multiple-input" class=" form-control-label">Multiple File input</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file">
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
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
@endsection