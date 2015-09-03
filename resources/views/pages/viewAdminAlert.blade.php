@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> View Alert</h4><br>
            <table class="table table-bordered" id="EmployeesTable">
                <thead>
                <th>Title</th>
                <th>Station</th>
                <th>Employee</th>
                <tbody>
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
                    </tr>
                </tbody>
                </thead>
            </table>
            
            <table class="table table-bordered" id="EmployeesTable">
                <thead>
                <th>Message</th>
                <th>Type</th>
                <tbody>
                    <tr>
                        <td>{{ $alert->message }}</td>
                        <td>
                            {{ $alert->type }}
                        </td>
                    </tr>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
@stop