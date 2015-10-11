@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> List of Services</h4><br>
            <table class="table table-bordered" id="StationsTable">
                <thead>
                <th>Type</th>
                <th>Client</th>
                <th>Vehicle Model</th>
                <th>Station</th>
                <th>When</th>
                <tbody>
                    @foreach($services as $service)
                    <tr>
                    <td>{{ $service->type->name }}</td>
                    <td>{{ $service->vehicle->client->name }}</td>
                    <td>{{ $service->vehicle->model->name }}</td>
                    <td>
                       {{ $service->station->name }}
                    </td>
                    <td>
                        {{ $service->created_at->diffForHumans() }}
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
            {!! $services->render() !!}
        </div>
    </div>
</div>
@stop