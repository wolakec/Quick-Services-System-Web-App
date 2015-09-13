
@extends('layouts.default')

@section('content')     
<div class="row">
<div class="dashboard-container">
    <div class="col-md-3">
        <div class="small-box bg-green">
                <div class="inner">
                  <h3>111</h3>
                  <p>Transactions of the day</p>
                </div>
            <a href="#" class="small-box-footer font25">New Transaction &nbsp;<i class="glyphicon glyphicon-plus"></i></a>
              </div>
    </div>
        
        <div class="col-md-3">
        <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>111</h3>
                  <p>Registrations today </p>
                </div>
                <a href="#" class="small-box-footer font25">More info &nbsp;<i class="glyphicon glyphicon-plus"></i></a>
              </div>
    </div>
        
        <div class="col-md-3">
        <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>111<sup style="font-size: 20px">SDG</sup></h3>
                  <p>Sales Value</p>
                </div>
                <a href="#" class="small-box-footer font25">More info <i class="glyphicon glyphicon-plus"></i></a>
              </div>
    </div>
        
        <div class="col-md-3">
        <div class="small-box bg-red">
                <div class="inner">
                  <h3>111</h3>
                  <p>Alerts</p>
                </div>
                <a href="{{ url('/alerts/pending') }}" class="small-box-footer font25">Pending Alerts<i class="glyphicon glyphicon-plus"></i></a>
              </div>
    </div>
</div>
</div><!--container -->

@stop
