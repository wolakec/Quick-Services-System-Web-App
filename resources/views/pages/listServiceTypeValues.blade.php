@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> Points for each service</h4><br>
            <table class="table table-bordered" id="ModelsTable">
                <thead>
                <th>Type</th>
                <th>Points</th>
                <th>Action</th>
                <tbody>
                    @foreach($values as $value)
                    <tr>
                        <td>
                            @if($value->type)
                                {{ $value->type->name }}
                           @endif
                        </td>
                        <td>{{ $value->points }}</td>
                        
                        <td><a href="{{ url('/services/values/'.$value->id.'/edit') }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
            {!! $values->render() !!}
        </div>
    </div>
</div>
@stop