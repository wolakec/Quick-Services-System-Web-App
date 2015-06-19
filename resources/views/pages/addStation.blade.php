@extends('layouts.default')

@section('content')     
<form name="addStation" method="post" action="{{ url('/stations/add') }}">
    Name: <input type="text" name="name"/></br>
    Address: <input type="text" name="address"/></br>
    Phone: <input type="text" name="phone_1"/></br>
    Location:<select name="location_id">
        @forelse($locations as $location)
        <option value="{{ $location->id }}">{{ $location->name }}</option>
        @empty
        <option>No locations in database</option>
        @endforelse
    </select></br>
    <input type="submit" value="submit" name="submit"/>
</form>
@stop
