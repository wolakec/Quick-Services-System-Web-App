@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
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
                       <div class="dropdown">
                           <button id="dLabel" type="button" class="btn btn-default no-border-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Options
                       <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu dropdownFix" role="menu" aria-labelledby="dLabel">
                            <li><a href="{{ url('/stations/'.$station->id.'/employees') }}">Employees</a></li>
                            @can('view',$station)
                            <li><a href="{{ url('/stations/'.$station->id.'/services/types') }}">Service Types</a></li>
                            @endcan
                            @can('edit',$station)
                                <li><a href="{{ url('/stations/'.$station->id.'/edit') }}">Edit</a></li>
                            @endcan
                            <li><a href="{{ url('/stations/'.$station->id.'/status') }}">View Status</a></li>
                            <li><a href="{{ url('/stations/'.$station->id.'/invoices/daily') }}">Sales Report</a></li>
                            <li><a href="{{ url('/stations/'.$station->id.'/invoices/dailyIn') }}">Purchase Report</a></li>
                            <li><a href="{{ url('/stock/'.$station->id) }}">View Stock</a></li>
                      </ul>
                    </div>
                        
                       
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
$('#pop').popover()
</script>
@stop
