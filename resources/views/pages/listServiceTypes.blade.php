@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> Services available at {{ $station->name }} Station</h4><br>
            <div class="col-md-offset-9">
                        <div class="container">
                            
                            <a href="{{ url('/stations/'.$station->id.'/services/types/availability/edit') }}"/><button type="button" class="btn btn-success">Update</button></a></br></br>
                        </div>
            </div>
            <table class="table table-bordered" id="StationsTable">
                <thead>
                <th>Name</th>
                <th>Availability</th>
                <tbody>
                    @foreach($serviceTypes as $serviceType)
                    <tr>
                    <td>{{ $serviceType->name }}</td>
                    <td>
                           @if($serviceType->is_available)
                                Available
                            @else
                                Unavailable
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
@stop