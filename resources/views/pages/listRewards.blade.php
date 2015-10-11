@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;"> List of Rewards</h4><br>
            <table class="table table-bordered" id="ModelsTable">
                <thead>
                <th>Title</th>
                <th>Description</th>
                <th>Cost</th>
                <th>Action</th>
                <tbody>
                    @foreach($rewards as $reward)
                    <tr>
                        <td>{{ $reward->title }}</td>
                        <td>{{ $reward->description }}</td>
                        <td><strong>{{ $reward->cost }}</strong> Points</td>
                        <td>
                            @can('edit',$reward)
                                <a href="{{ url('/rewards/'.$reward->id.'/edit') }}">Edit</a>
                            @else
                                No Action
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
            {!! $rewards->render() !!}
        </div>
    </div>
</div>
@stop