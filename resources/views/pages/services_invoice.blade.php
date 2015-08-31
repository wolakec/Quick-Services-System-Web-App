@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;">Services invoice</h4><br>
            <table class="table table-bordered table-hover" id="StationsTable">
                <thead>
                <th>Service</th>
                <th>Station</th>
                <th>Time</th>
                <th>Price</th>
                <th>Total</th>
                <tbody>
                    <tr>
                    <td>oil Change</td>
                    <td>Mamora Station</td>
                    <td>11:30AM/18/9/2015</td>
                    <td>140</td>
                    <td>140</td>
                    </tr>
                    <tr>
                    <td>Tires Check</td>
                    <td>Mamora Station</td>
                    <td>12:30AM/18/9/2015</td>
                    <td>40</td>
                    <td>40</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="warning">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Sub Total</td>
                        <td>180</td>
                    </tr>
                    <tr class="success">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Grand Total</td>
                        <td>200</td>
                    </tr>
                </tbody>
                </thead>
                <div class="pull-left">
                    <h3>Services Invoice</h3>
                <p>Station: Mamora quick services station</p>
                <p>Location:Mamora 60st,Khartoum</p>
                <p>Contact Number:988564678</p>
                <p>Invoice:998</p>
                </div>
                <div class="pull-right">
                    <span><img class="logo" style="max-height: 70px; margin-bottom: 10px;" src="{{ asset('Images/qsLogoWeb.png') }}"></span>    
                <p>Customer name:Wol akec</p>
                <p>Date:19/8/2015</p>
                <p>Time:1:20 PM</p>
                </div>
            </table>
            <button class="btn btn-info">Print</button><small>&nbsp; click here to print the invoices </small>
        </div>
    </div>
</div>
@stop