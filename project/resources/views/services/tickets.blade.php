@extends('inc.layout')
@section('title')
    SPS » View Tickets
@stop

@section('content')
    <div id='mainBanner'>
        <!-- Sub banner start -->
        <div class="sub-banner overview-bgi" style="background-image: url('{{asset('front')}}/img/police.jpg')">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>View Tickets</h1>
                </div>
            </div>
        </div>
        <!-- Sub banner end -->

        <div class="container" style="margin-top: 40px;margin-bottom: 40px">

            <form method="post" action="{{route('tickets')}}">
                @csrf
                <label for="search">Enter License Plate Number: </label>
                <input type="text" name="searchValue" id="searchValue" value="{{old('searchValue')}}" required
                       autofocus>
                @if ($errors->has('searchValue'))
                    <span style="color:red;">
                            <strong>{{ $errors->first('searchValue') }}</strong>
                        </span>
                @endif

                <label for="search">Enter Chassis Number: </label>
                <input type="text" name="searchValue1" id="searchValue1" value="{{old('searchValue1')}}" required
                       autofocus>
                @if ($errors->has('searchValue1'))
                    <span style="color:red;">
                            <strong>{{ $errors->first('searchValue1') }}</strong>
                        </span>
                @endif
                <button type="submit"> Search</button>
            </form>

        </div>


        @if (count($tickets)!=0)
            <div class="container">
                <table class="table table-light">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">License Plate Number</th>
                        <th scope="col">Chassis Number</th>
                        <th scope="col">Amount of Ticket(ALL)</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date received</th>
                    </tr>
                    </thead>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{$ticket->id}}</td>
                            <td>{{$ticket->license_number}}</td>
                            <td>{{$ticket->chassis_number}}</td>
                            <td>{{$ticket->amount}}</td>
                            <td>{{$ticket->description}}</td>
                            <td>{{$ticket->created_at}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
    </div>

@stop
