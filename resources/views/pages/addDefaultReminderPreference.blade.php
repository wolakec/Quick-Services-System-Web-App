@extends('layouts.default')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;">Set Service Type Reminder Preference</h4><br/>
            <form class="form-horizontal" name="addServicePreference" method="post" action="{{ url('/services/preferences/add') }}">
                <div class="form-group">
                    <label>Service Type</label>
                    <select name="service_type_id" class="form-control">
                    @forelse($serviceTypes as $serviceType)
                    <option value="{{ $serviceType->id }}">{{ $serviceType->name }}</option>
                    @empty
                    <option>No Service Types in database</option>
                    @endforelse
                </select>
                </div>
                <div class="form-group">
                    <label>Number of days until reminder</label>
                   <input type="number" class="form-control" name="period" placeholder="Number of days until reminder">
               <div class="text-danger">{{ $errors->first('period') }}</div>
                </div>
                
                <div class="form-group">
                <button type="submit" class="btn btn-success"value="submit" name="submit">Submit</button>
                </div>
            </form>  
        </div>
    </div>
</div>

@stop
