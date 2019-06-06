@extends('inc.inside')

@section('title')
    SPS » Employee Search
@stop

@section('content')
    <div id='mainBanner'>
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi"
             style="background-image: url('{{asset('front')}}/img/police.jpg');height: 300px;">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1 style="color: white;">Citizen Database Lookup</h1>
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
                <li class="breadcrumb-item active">Citizen Lookup</li>
            </ol>
        </div>

        @if (\Illuminate\Support\Facades\Session::has('info'))
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    {{ session('info') }}
                </div>
            </div>
        @endif

        <div class="container" style="margin-top: 40px;margin-bottom: 40px">

            <form method="post" action="{{route('citizenSearch')}}">
                @csrf
                <label for="search">Search by: </label>
                <select id="search" name="search" required>
                    <option value="name">Name</option>
                    <option value="surname">Surname</option>
                    <option value="personal_no">Personal Number</option>
                </select>
                <label for="searchValue">
                    Enter value to search:
                </label>
                <input type="text" name="searchValue" id="searchValue" value="{{old('searchValue')}}" required
                       autofocus>
                @if ($errors->has('searchValue'))
                    <span style="color:red;">
                            <strong>{{ $errors->first('searchValue') }}</strong>
                        </span>
                @endif
                <button type="submit"> Search</button>
            </form>
            {{--<a href="{{route('citizenSearch')}}" style=" margin-top: 15px" class="btn btn-primary mybtn">Search by--}}
            {{--post</a>--}}

        </div>


        @if (count($citizens)!=0)
            <div class="container">
                <table class="table table-light">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Father's Name</th>
                        <th scope="col">Mother's Name</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Personal Number</th>
                        <th scope="col">Martial Status</th>
                        <th style="text-align:center" colspan="2">Actions</th>
                    </tr>
                    </thead>
                    @foreach($citizens as $citizen)
                        <tr>
                            <td>{{$citizen->id}}</td>
                            <td>{{$citizen->name}}</td>
                            <td>{{$citizen->surname}}</td>
                            <td>{{$citizen->father_name}}</td>
                            <td>{{$citizen->mother_name}}</td>
                            <td>{{$citizen->birthdate}}</td>
                            <td>{{$citizen->gender}}</td>
                            <td>{{$citizen->personal_no}}</td>
                            <td>{{strtoupper($citizen->maritial_status)}}</td>
                            <td>
                                <a href="{{route('openProfile',['id'=>$citizen->id])}}" class="btn btn-danger btn-sm"
                                   style="font-weight:bold;cursor:pointer;">Open</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
    </div>

@stop
