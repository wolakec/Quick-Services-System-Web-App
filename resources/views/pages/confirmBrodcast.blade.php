@extends('layouts.default')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align: center;">confirm your Broadcast</h4><br/>
            <form class="form-horizontal" name="addBroadcast" method="post" action="{{ url('/notifications/add') }}">
                <input name="title" class="hidden" hidden="hidden" value="{{ $request->title }}">
                <input name="message" class="hidden" hidden="hidden" value="{{ $request->message }}">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $request->title }}</div>
                        <div class="panel-body">
                           {{  $request->message }}
                        </div>
                </div>
              <button type="submit" value="Submit" name="submit" class="btn btn-success">confirm</button>
            </form>
        </div>
    </div>
</div>

@stop