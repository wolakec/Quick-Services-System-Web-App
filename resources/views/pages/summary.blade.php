@extends('layouts.default')

@section('content')   
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <h2>Account Created</h2>
<h4>Login Details:</h4>
<table class="table table-bordered" id="ModelsTable">
                <thead>
                <th>Email</th>
                <th>Password</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $email }}</td>
                        <td>{{ $password }}</td>
                    </tr>
                    </tbody>
            </table>
                    
                    

            
        </div>
        </div>

@stop
