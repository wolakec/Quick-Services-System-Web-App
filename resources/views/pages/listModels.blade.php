@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> List of Models</h4><br>
            <table class="table table-bordered" id="ModelsTable">
                <thead>
                <th>Make</th>
                <th>Model</th>
                <th>Action</th>
                <tbody>
                    @foreach($models as $model)
                    <tr>
                        <td>
                            @if($model->make)
                                {{ $model->make->name }}
                           @endif
                        </td>
                        <td>{{ $model->name }}</td>
                        <td>
                            @can('editModel',$model)
                            <a href="{{ url('/models/'.$model->id.'/edit') }}">Edit</a>
                            @else
                                No action
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
            {!! $models->render() !!}
        </div>
    </div>
</div>
@stop