@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> List of Stations</h4><br>
            <table class="table table-bordered" id="StationsTable">
                <thead>
                <th>Name</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Location</th>
                <th>Action</th>
                <tbody>
                    @foreach($stations as $station)
                    <tr>
                    <td>{{ $station->name }}</td>
                    <td>{{ $station->address }}</td>
                    <td>{{ $station->phone_1 }}</td>
                    <td>
                        @if($station->location)
                            {{ $station->location->name }}
                       @endif
                    </td>
                    <td>
                        <a href="{{ url('/stations/'.$station->id.'/employees') }}">Employees</a> - 
                        <a href="{{ url('/stations/'.$station->id.'/services/types') }}">Service Types</a> - 
                        <a href="{{ url('/stock/'.$station->id) }}">View Stock</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
@stop
