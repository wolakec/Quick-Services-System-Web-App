@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> Station Status</h4><br>
            <table class="table table-bordered" id="EmployeesTable">
                <thead>
                    <th>Message</th>
                    <th>Open</th>
                    <th>Diesel</th>
                    <th>Petrol</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $status->message }}</td>
                        <td>
                            @if($status->open)
                            
                            @else
                            
                            @endif
                        </td>
                        <td>
                            @if($alert->employee)
                            {{ $alert->employee->name }}
                            @endif
                        </td>
                    </tr>
                </tbody>
                </thead
            </table>
            
            <table class="table table-bordered" id="EmployeesTable">
                <thead>
                <th>Message</th>
                <th>Type</th>
                <tbody>
                    <tr>
                        <td>{{ $status->message }}</td>
                        <td>
                            {{ $status->type }}
                        </td>
                    </tr>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
@stop