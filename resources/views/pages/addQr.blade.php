@extends('layouts.default')

@section('content') 
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align: center;">Generate QR Codes</h4><br/>
            <form class="form-horizontal" name="qrForm" action="{{ url('/codes/add') }}" method="post">
                <div class="form-group">
                    <label>Prefix</label>
                    <input type="text" name="prefix" class="form-control" placeholder=" Prefix">
                    <div class="text-danger">{{ $errors->first('prefix') }}</div>
                </div>
                <div class="form-group">
                    <label>Quota</label> 
                    <select name="quota" class="form-control">
                        <option value="1">1</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="500">500</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" value="Generate"class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop