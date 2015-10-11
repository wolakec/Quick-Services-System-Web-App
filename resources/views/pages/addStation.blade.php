@extends('layouts.default')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;">Add Station</h4><br/>
            <form name="addStation" class="form-horizontal" method="post" action="{{ url('/stations/add') }}">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                <div class="text-danger">{{ $errors->first('name') }}</div>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address">
                    <div class="text-danger">{{ $errors->first('address') }}</div>
                </div>
                <div class="form-group">
                    <label>Telephone No</label>
                    <input type="text"  class="form-control" name="phone_1" placeholder="Telephone">
                    <div class="text-danger">{{ $errors->first('phone_1') }}</div>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <select name="location_id"class="form-control">
                        @forelse($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @empty
                        <option>No locations in database</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    @forelse($serviceTypes as $serviceType)
                    <span class="blockSpan"> <input type="checkbox"  checked value="{{ $serviceType->id }}" name="service_type_id[]"/><label class="checkLable">&nbsp;{{ $serviceType->name }}&nbsp;</label> </span>
                    @empty
                    No service types in database
                    @endforelse
<div class="text-danger">{{ $errors->first('service_type_id[]') }}</div>
                
                </div>
                <button type="submit" value="submit" name="submit"class="btn btn-success"> Submit</button>
        </div>
        </form>
    </div>
</div>
</div>
@stop
