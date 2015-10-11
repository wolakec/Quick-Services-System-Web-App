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
                <th>Action</th>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->employee_id }}</td>
                        <td>{{ $employee->user->email }}</td>
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
                        <td>
                            <div class="dropdown">
                                <button id="dLabel" type="button" class="btn btn-default no-border-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                   <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdownFix" role="menu" aria-labelledby="dLabel">
                                    <li><a href="{{ url('/employees/'.$employee->id.'/edit') }}">Edit</a></li>
                                    <li><a href="{{ url('/employees/'.$employee->id.'/transactions') }}">View Transactions</a></li>
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
@stop