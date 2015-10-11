@extends('layouts.default')

@section('content')     
        <div class="container" ng-app="myApp" ng-controller="ProductFormController">
            <div class="row">
            <form class="form-horizontal" method='post' action='{{ url('/product/add') }}'>    
                <h4> Add New Product </h4><br>
            <fieldset class="col-lg-4">
            <div class="form-group">
       	<label>Product Name</label>           	
            		<input type="text" class="form-control" id="ProductName" name="name" placeholder="Product Name">
                        <div class="text-danger">{{ $errors->first('name') }}</div>
            	</div>
            <div class="form-group">
           	<label>Specification</label>
            		<input type="text" class="form-control" id="Specification" name="specification" placeholder="Specification">
                        <div class="text-danger">{{ $errors->first('specification') }}</div>
            	</div>
            <div class="form-group">
           	<label>Product Code</label>       
            		<input type="text" class="form-control" id="inputEmail3" placeholder="Product Code" name="code">
                        <div class="text-danger">{{ $errors->first('code') }}</div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>                
           <div class="form-group"> 
               <label>Description</label>               
            		<input type="text" class="form-control" id="inputEmail3" placeholder="Description" name="description">
                        <div class="text-danger">{{ $errors->first('description') }}</div>
            	</div>
            <div class="form-group">
          	<label>Application</label>
            
            		<select name="category_id" class="form-control">
            			@forelse($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                <option value="false" class="disabled">You have no categories in the database</option>
                                @endforelse
            		</select> 
            	</div>
            <div class="form-group">
<!--            	<label for="inputEmail3" class="control-label"></label>-->
            	<div>
            		<button type="submit" class="btn btn-info">Add Product</button>
            	</div>
            </div>
            </fieldset>
            <fieldset class="col-lg-5 col-lg-offset-2">
            <div class="form-group">
            	<table class="line-form-hack">
                    <tr>
                        <th>Package</th>
                        <th>Cost</th>
                        <th>Price</th>
                    </tr>
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
                    </fieldset>
            	</table>
            </div>
            <div class="form-group">
            	<label for="inputEmail3" class="control-label"></label>
            	<div>
            		<button type="button" ng-click="addPackage()"class="btn btn-default">New Package</button>
            	</div>
            </div>
            </fieldset>
            </form>
            </div>
@stop