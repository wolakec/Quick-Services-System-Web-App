@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> Transactions</h4><br>
            <table class="table table-bordered" id="EmployeesTable">
                <thead>
                <th>Employee</th>
                <th>Station</th>
                <th>Date</th>
                <th>Total</th>
                <th>Action</th>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->employee->name }}</td>
                        <td>{{ $transaction->station->name }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>-</td> 
                       
                        <td><a href="{{ url('/transactions/'.$transaction->id.'/invoice') }}">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
@stop

