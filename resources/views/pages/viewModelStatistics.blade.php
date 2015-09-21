@extends('layouts.default')

@section('content')
<h3 style="text-align: center;">Vehicle Model Statistics</h3><br>
        <div class="container">
            <div class="row">
                <div class='chart-con-div' class="col-lg-offset-3 col-md-12">
                   {!! Lava::render('PieChart', 'Models', 'chart-div',array('height'=>500, 'width'=>800)) !!}

                </div>
            </div>
        </div>
@stop
