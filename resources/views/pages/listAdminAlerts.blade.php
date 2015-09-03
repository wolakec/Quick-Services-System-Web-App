@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> Pending Alerts</h4><br>
            <table class="table table-bordered" id="EmployeesTable">
                <thead>
                <th>Title</th>
                <th>Station</th>
                <th>Employee</th>
                <th>Action</th>
                <tbody>
                    @foreach($alerts as $alert)
                    <tr>
                        <td>{{ $alert->title }}</td>
                        <td>
                            @if($alert->station)
                            {{ $alert->station->name }}
                            @endif
                        </td>
                        <td>
                            @if($alert->employee)
                            {{ $alert->employee->name }}
                            @endif
                        </td>
                        <td><a href="{{ url('/alerts/'.$alert->id) }}">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
@stop