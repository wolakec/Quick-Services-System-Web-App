@extends('layouts.default')

@section('content') 
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;"> Company Information</h4><br/>
            <form class="form-horizontal" name="addEmployee" method="post" action="{{ url('/employees/add') }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="company_name" placeholder="Company Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_number1" placeholder="Contact Number 1">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"name="contact_number2" placeholder="Contact Number 2">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"value="submit" name="submit">Submit</button>
                </div>
            </form>  
        </div>
    </div>
</div>
@stop
