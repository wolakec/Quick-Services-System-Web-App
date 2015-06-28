@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> List of Employees</h4><br>
            <table class="table table-bordered" id="EmployeesTable">
                <thead>
                <th>Name</th>
                <th>Employee Id</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Location</th>
                <th>Station</th>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->employee_id }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone_1 }}</td>
                        <td>
                            @if($employee->location)
                            {{ $employee->location->name }}
                            @endif
                        </td>
                        <td>
                            @if($employee->station)
                            {{ $employee->station->name }}
                            @endif
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