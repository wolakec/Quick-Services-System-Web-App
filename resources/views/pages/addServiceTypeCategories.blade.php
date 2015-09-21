@extends('layouts.default')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;">Set Service Type Categories</h4><br/>
            <form class="form-horizontal" name="addServiceTypeCategories" method="post" action="{{ url('/services/categories/add') }}">
                <div class="form-group">
                    <label>Set Service Type Categories</label>
                    <select name="service_type_id" class="form-control">
                    @forelse($serviceTypes as $serviceType)
                    <option value="{{ $serviceType->id }}">{{ $serviceType->name }}</option>
                    @empty
                    <option>No Service Types in database</option>
                    @endforelse
                </select>
                    <div class="text-danger">{{ $errors->first('service_type_id') }}</div>
                </div>
                <div class="form-group">
                    <fieldset>
                        <tr ng-repeat="package in packages">
                            <td>
                                <select name="packages[@{{ $index }}][unit_id]" class="form-control">
                                        @forelse($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @empty
                                        <option value="false" class="disabled">Empty</option>
                                        @endforelse
                                </select>
                            </td>
                            <td>
                               <input type="text" class="form-control" id="price" name="packages[@{{ $index }}][cost]" placeholder="Cost">
                               <div class="text-danger">{{ $errors->first('packages[][cost]') }}</div>
                            </td>
                            <td>
                               <input type="text" class="form-control" id="price" name="packages[@{{ $index }}][base_price]" placeholder="Price">
                               <div class="text-danger">{{ $errors->first('packages[][base_price]') }}</div>
                            </td>
                            
                        </tr>
                        <div>
                            <button type="button" ng-click="addPackage()"class="btn btn-default">New Package</button>
                        </div>
                    </fieldset>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-success"value="submit" name="submit">Submit</button>
                </div>
            </form>  
        </div>
    </div>
</div>

@stop
