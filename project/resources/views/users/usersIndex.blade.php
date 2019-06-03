@extends('inc.inside')

@section('title')
    SPS » Police Employees Lookup
@stop

@section('content')
    <div id='mainBanner'>
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi" style="background-image: url('{{asset('front')}}/img/police.jpg');height: 300px;">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1 style="color: white;">Police Employees Database Lookup</h1>
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
                <li class="breadcrumb-item active">Police Employees Lookup</li>
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

            <form method="post" action="{{route('userSearch')}}">
                @csrf
                <label for="search">Search by: </label>
                <select id="search" name="search" required>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="id">Personal Number</option>
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
        </div>


        @if (count($users)!=0)
            <div class="container">
                <table class="table table-light">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Position</th>
                        <th style="text-align:center" colspan="2">Actions</th>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>@if($user->role == '1')
                                    Regular Employee
                                @elseif($user->role == '2')
                                    Police Officer
                                @elseif($user->role == '3')
                                    Chief Police Officer
                                @else
                                    Internal Affairs Employee
                                    @endif
                            </td>
                            <td>
                                <a href="{{route('openUser',['id'=>$user->id])}}" class="btn btn-danger btn-sm"
                                   style="font-weight:bold;cursor:pointer;">Open</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
    </div>

@stop
