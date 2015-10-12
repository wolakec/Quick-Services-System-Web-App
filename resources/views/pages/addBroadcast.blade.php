@extends('layouts.default')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align: center;">Create Broadcast</h4><br/>
            <form class="form-horizontal" name="addBroadcast" method="post" action="{{ url('/notifications/confirm') }}">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                    <div class="text-danger">{{ $errors->first('title') }}</div>
                </div>
                <div class="form-group">
                    <label>Message:</label>
                 <textarea name="message" class="form-control"></textarea>
                 <div class="text-danger">{{ $errors->first('message') }}</div>
                </div>
                
                <div class="form-group">
                <button type="submit" value="Submit" name="submit" class="btn btn-success">Submit</button>
                </div>
    </form>
        </div>
    </div>
</div>
@stop