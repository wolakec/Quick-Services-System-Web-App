@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align: center;">Add Company Information</h4><br/>
            @if (session('info'))
                <div class="alert alert-warning">
                    {{ session('info') }}
                </div>
            @endif
            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Fax</th>
                                    <th>Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{ $company->name }}</th>
                                    <th>{{ $company->email }}</th>
                                    <th>{{ $company->telephone }}</th>
                                    <th>{{ $company->fax }}</th>
                                    <th>{{ $company->location }}</th>
                                    <th><a href="{{ url('/company/'.$company->id.'/edit') }}">Edit</a></th>
                                </tr>
                            </tbody>
            </table>
                                
        </div>
    </div>
</div>
@stop

