@extends('layouts.default')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;"> Add Employee</h4><br/>
            <form class="form-horizontal" name="addEmployee" method="post" action="{{ url('/employees/add') }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="employee_id" placeholder="Employee ID">
                    <div class="text-danger">{{ $errors->first('employee_id') }}</div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"name="name" placeholder="Name">
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                    
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone_1" placeholder="Telephone">
              <div class="text-danger">{{ $errors->first('phone_1') }}</div>

                </div>
                
                <div class="form-group">
                    <label>Location:</label>
                    <select name="location_id" class="form-control">
                        @forelse($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @empty
                        <option>No locations in database</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label>Station:</label>
                    <select name="station_id" class="form-control">
                        @forelse($stations as $station)
                        <option value="{{ $station->id }}">{{ $station->name }}</option>
                        @empty
                        <option>No Stations in database</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"value="submit" name="submit">Submit</button>
                </div>
                
                                
                
            </form>  
        </div>
        
        
    </div>
</div>
@stop
