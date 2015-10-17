@extends('layouts.default')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align: center;">Add Rewards</h4><br/>
            <form class="form-horizontal" name="addReward" method="post" action="{{ url('/rewards/add') }}">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                    <div class="text-danger">{{ $errors->first('title') }}</div>
                </div>
                <div class="form-group">
                    <label>Cost</label>
                    <input type="text" name="cost" class="form-control" placeholder="Cost">
                    <div class="text-danger">{{ $errors->first('cost') }}</div>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                 <textarea name="description" class="form-control"></textarea>
                 <div class="text-danger">{{ $errors->first('description') }}</div>
                </div>
                
                <div class="form-group">
                <button type="submit" value="Submit" name="submit" class="btn btn-success">Submit</button>
                </div>
    </form>
        </div>
    </div>
</div>
@stop