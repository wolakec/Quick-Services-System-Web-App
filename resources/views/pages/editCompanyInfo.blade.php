@extends('layouts.default')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align: center;">Add Company Information</h4><br/>
            <form class="form-horizontal" name="company" method="post" action="{{ url('/company/'.$company->id.'/edit') }}">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $company->name }}">
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $company->email }}">
                </div>
                <div class="form-group">
                    <input type="number" name="telephone" class="form-control" placeholder="Telephone" value="{{$company->telephone}}">
                </div>
                <div class="form-group">
                    <input type="text" name="fax" class="form-control" placeholder="Fax" value="{{$company->fax}}">
                </div>
                <div class="form-group">
                    <input type="text" name="location" class="form-control" placeholder="Location" value="{{$company->location}}">
                </div>
                <div class="form-group">
                <button type="submit" value="Submit" name="submit" class="btn btn-success">Submit</button>
                </div>
    </form>
        </div>
    </div>
</div>
@stop

