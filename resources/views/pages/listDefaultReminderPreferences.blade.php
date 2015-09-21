@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> Duration until reminder for each service</h4><br>
            <table class="table table-bordered" id="ModelsTable">
                <thead>
                <th>Type</th>
                <th>Period</th>
                <th>Action</th>
                <tbody>
                    @foreach($preferences as $preference)
                    <tr>
                        <td>
                            @if($preference->type)
                                {{ $preference->type->name }}
                           @endif
                        </td>
                        <td>{{ $preference->period }}</td>
                        <td>
                        @can('edit',$preference)
                            <a href="{{ url('/services/preferences/'.$preference->id.'/edit') }}">Edit</a></td>
                        @else
                            No Action
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
@stop