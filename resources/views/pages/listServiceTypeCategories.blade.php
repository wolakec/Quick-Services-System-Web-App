@extends('layouts.default')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;">Service Type Categories</h4><br/>
            <form class="form-horizontal" name="addServiceTypeCategories" method="post" action="{{ url('/services/categories/add') }}">
                <div class="form-group">
                    <table>
                        <thead>
                            <th>Name</th>
                            <th>Action</th>
                            <tbody>
                                @foreach($serviceTypes as $serviceType)
                                <tr>
                                <td>{{ $serviceType->name }}</td>
                                <td><a href="{{ url('/services/categories/'.$serviceType->id.'/edit') }}">Update Categories</a>
                                </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
        </div>
    </div>
</div>

@stop
