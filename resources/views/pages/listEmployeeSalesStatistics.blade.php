@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> Employees Sales Statistics</h4><br>
            <table class="table table-bordered" id="EmployeesTable">
                <thead>
                <th>Name</th>
                <th>Products Sold</th>
                <th>Total Sales Income</th>
                <th>Location</th>
                <th>Station</th>
                <th>Action</th>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>
                            @if($employee->total_products_sold)
                            {{ $employee->total_products_sold }}
                            @else
                            N/A
                            @endif
                        </td>
                        <td>
                            @if($employee->total_sales_value)
                            {{ $employee->total_sales_value }}
                            @else
                            N/A
                            @endif
                        </td>
                        <td>
                            {{ $employee->location_name }}

                        </td>
                        <td>

                            {{ $employee->station_name }}

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