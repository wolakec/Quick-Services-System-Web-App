@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;">Services invoice</h4><br>
            <table class="table table-bordered table-hover" id="StationsTable">
                <thead>
                <th>Product</th>
                <th>Package</th>
                <th>Station</th>
                <th>Employee</th>
                <th>Date</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <tbody>
                    @foreach($transactions as $transaction)
                    
                    <tr>
                    <td>{{ $transaction->package->product->name }}</td>
                    <td>{{ $transaction->package->unit->name }}</td>
                    <td>{{ $transaction->transaction->station->name }}</td>
                    <td>{{ $transaction->transaction->employee->name }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>£{{ $transaction->price }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>£{{ $transaction->total_price }}</td>
                    </tr>
                    @endforeach
                    <tr class="warning">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Sub Total</td>
                        <td>£{{ $grandTotal }}</td>
                    </tr>
                    <tr class="success">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Grand Total</td>
                        <td>£{{ $grandTotal }}</td>
                    </tr>
                </tbody>
                </thead>
                <div class="pull-left">
                    <h3>Services Invoice</h3>
                    <p><strong>Station:</strong> {{ $station->name }}</p>
                <p><strong>Location:</strong>{{ $station->address }}</p>
                <p><strong>Station Contact Number:</strong> {{ $station->phone_1 }} </p>
                <p><strong>Invoice No:</strong> 998</p>
                </div>
                <div class="pull-right">
                    <span><img class="logo" style="max-height: 70px; margin-bottom: 10px;" src="{{ asset('Images/qsLogoWeb.png') }}"></span>    
                <p><strong>Date:</strong> 19/8/2015</p>
                <p><strong>Time:</strong> 1:20 PM</p>
                </div>
            </table>
            <button class="btn btn-info">Print</button><small>&nbsp; Click to print invoice </small>
        </div>
    </div>
</div>
@stop