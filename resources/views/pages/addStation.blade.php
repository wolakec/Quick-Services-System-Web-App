@extends('layouts.default')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;">Add Station</h4><br/>
            <form name="addStation" class="form-horizontal" method="post" action="{{ url('/stations/add') }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <input type="text"  class="form-control" name="phone_1" placeholder="Telephone">
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
                    {{ $serviceType->name }}<input type="checkbox" value="{{ $serviceType->id }}" name="service_type_id[]"/>
                    @empty
                    No service types in database
                    @endforelse
                </div>
                <button type="submit" value="submit" name="submit"class="btn btn-success"> Submit</button>
            </form>
        </div>
    </div>
</div>
@stop
