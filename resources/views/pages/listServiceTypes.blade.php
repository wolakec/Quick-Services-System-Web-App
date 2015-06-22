@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> Services available at {{ $station->name }} Station</h4><br>
            <table class="table table-bordered" id="StationsTable">
                <thead>
                <th>Name</th>
                <tbody>
                    @foreach($serviceTypes as $serviceType)
                    <tr>
                    <td>{{ $serviceType->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
@stop