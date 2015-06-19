@extends('layouts.default')

@section('content')     
<form name="addEmployee" method="post" action="{{ url('/employees/add') }}">
    Employee Id: <input type="text" name="employee_id"/></br>
    Name: <input type="text" name="name"/></br>
    Email: <input type="email" name="email"/></br>
    Phone: <input type="text" name="phone_1"/></br>
    Location:<select name="location_id">
        @forelse($locations as $location)
        <option value="{{ $location->id }}">{{ $location->name }}</option>
        @empty
        <option>No locations in database</option>
        @endforelse
    </select></br>
    Station:<select name="station_id">
        @forelse($stations as $station)
        <option value="{{ $station->id }}">{{ $station->name }}</option>
        @empty
        <option>No Stations in database</option>
        @endforelse
    </select></br>
    <input type="submit" value="submit" name="submit"/>
</form>
@stop
