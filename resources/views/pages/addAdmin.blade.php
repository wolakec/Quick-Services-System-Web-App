@extends('layouts.default')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align: center;">Create Administrator Account</h4><br/>
            <form class="form-horizontal" name="admin" method="post" action="{{ url('/admin/add') }}">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                </div>
                <div class="form-group">
                <button type="submit" value="Submit" name="submit" class="btn btn-success">Submit</button>
                </div>
    </form>
        </div>
    </div>
</div>
@stop

