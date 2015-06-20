@extends('layouts.default')

@section('content') 
<h2>Generate QR Codes</h2>
<form name="qrForm" action="{{ url('/codes/add') }}" method="post">
    Prefix: <input type="text" name="prefix"/></br>
    Quota: <select name="quota">
        <option value="1">1</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="200">200</option>
        <option value="500">500</option>
    </select></br>
    <input type="submit" name="submit" value="Generate"/>
</form>
@stop