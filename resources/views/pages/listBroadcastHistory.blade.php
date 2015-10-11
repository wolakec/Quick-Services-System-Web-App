@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(Session::has('success'))
        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
    
@endif
            <h4 style="text-align: center;"> Broadcast History</h4><br>
            <table class="table table-bordered" id="EmployeesTable">
                <thead>
                <th>Title</th>
                <th>Message</th>
                <th>User</th>
                <tbody>
                    @foreach($broadcasts as $broadcast)
                    <tr>
                        <td>{{ $broadcast->title }}</td>
                        <td>{{ $broadcast->message }}</td>
                        <td>{{ $broadcast->user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
            {!! $broadcasts->render() !!}
        </div>
    </div>
</div>
<script> 
    $('.close').alert();
    
    </script>
@stop