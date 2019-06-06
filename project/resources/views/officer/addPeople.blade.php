@extends('layouts.new')

@section('title')
    SPS » Edit Case
@stop


@section('content')
    <div id='mainBanner' style="margin-top: -30px">
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi"
             style="height:300px;background-image: url('{{asset('front')}}/img/police.jpg')">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>Cases</h1>
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
                <li class="breadcrumb-item"><a href="{{route('viewCases',['id'=>$case->filedBy->id])}}">Cases</a></li>
                <li class="breadcrumb-item active">{{$case->title}}</li>
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
    <div class="card">
        <div class="card-header" style="text-align: center;;">
            <strong>Edit a case</strong>
        </div>
        <div class="card-body card-block">
            <div class="container" style="margin-top: 40px;margin-bottom: 40px">

                <form method="post" action="{{route('citizenSearchCase',['id'=>$case->id])}}">
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
                                    @if(!$citizen->cases()->get()->contains($case->id))
                                        <form method="post" action="{{route('addPeople',['id' => $case->id])}}">
                                            @csrf
                                            <input type="text" name="id" value="{{$citizen->id}}" hidden>
                                            <button
                                                    type="submit" class="btn btn-primary">Add to this case
                                            </button>
                                        </form>
                                    @else
                                        <form method="post" action="{{route('deletePeople',['id' => $case->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="text" name="id" value="{{$citizen->id}}" hidden>
                                            <button
                                                    type="submit" class="btn btn-danger">Remove from this case
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        </div>


        {{--<form action="{{route('addPeople',['id'=>$case->id])}}"--}}
        {{--method="post">--}}
        {{--@csrf--}}
        {{--@method('patch')--}}
        {{--<div class="form-group">--}}
        {{--<label for="people">Add people under investigation</label>--}}
        {{--<select id="people" class="selectpicker" multiple data-live-search="true" name="people">--}}
        {{--@foreach()--}}
        {{--</select>--}}
        {{--@if ($errors->has('title'))--}}
        {{--<span class="help-block">--}}
        {{--<strong>{{ $errors->first('title') }}</strong>--}}
        {{--</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--<button type='submit'--}}
        {{--class='btn btn-primary'>--}}
        {{--Edit Case--}}
        {{--</button>--}}
        {{--</form>--}}
    </div>
    </div>
@stop