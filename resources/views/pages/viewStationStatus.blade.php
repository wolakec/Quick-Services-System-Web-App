@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> Station Status</h4><br>
            <table class="table table-bordered" id="EmployeesTable">
                <thead>
                    <th>Message</th>
                    <th>Open</th>
                    <th>Diesel</th>
                    <th>Petrol</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $status->message }}</td>
                        <td>
                            @if($status->is_open)
                                Open
                            @else
                                closed
                            @endif
                        </td>
                        <td>
                           @if($status->has_diesel)
                                Available
                            @else
                                Unavailable
                            @endif
                        </td>
                        <td>
                           @if($status->has_petrol)
                                Available
                            @else
                                Unavailable
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/stations/'.$station->id.'/status/edit') }}">Update</a>
                        </td>
                    </tr>
                </tbody>
                </thead
            </table>
            
        </div>
    </div>
</div>
@stop