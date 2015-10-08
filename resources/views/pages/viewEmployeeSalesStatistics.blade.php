@extends('layouts.default')

@section('content')
<h3 style="text-align: center;">Employee Sales Statistics</h3><br>
        <div class="container">
            <div class="row">
                <div id='stocks-div' class="col-md-12">
                   
                </div>
            </div>
        </div>
{!! Lava::render('PieChart', 'Sales', 'test-div',array('height'=>500, 'width'=>800)) !!}
@stop
