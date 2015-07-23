@extends('layouts.default')

@section('content')
<h3 style="text-align: center;">{{ $station->name }} Station Stock</h3><br>
        <div class="container" ng-app="MyApp" ng-controller="MyCtrl">
            <div class="row">
                <div class="col-md-12">
                    <form name="stockForm" method="post" action="{{ url('/stock/'.$station->id.'/update') }}"/>
                        <table class="table table-bordered" id="StockTable">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Package</th>
                                    <th>Specification</th>
                                    <th>Current Stock</th>
                                    <th>Incoming Stock</th>
                                    <th>Updated Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr ng-repeat="package in packages">
                                    <td>@{{ package.category_name}}</td>
                                    <td>@{{ package.id }}</td>
                                    <td>@{{ package.code}}</td>
                                    <td>@{{ package.name }}</td>
                                    <td>@{{ package.unit_name }}</td>
                                    <td>@{{ package.specification }}</td>
                                    <td>
                                        <input type="text" disabled="disabled" ng-model="holder[package.id].current" ng-init="holder[package.id].current = (package.quantity ? package.quantity : 0 )"/>
                                    </td>
                                    <td><input type="text" ng-model="holder[package.id].newQuantity" name="package[@{{package.id}}][quantity]" ng-init="holder[package.id].newQuantity = 0"/></td>
                                    <td>@{{ (holder[package.id].newQuantity * 1) + (holder[package.id].current * 1) }}</td>
                                </tr>
                            
                            </tbody>
                        </table>
                        <div class="col-md-offset-10">
                            <button type="submit" value="submit" name="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
                
                    
            </div>
        </div>
<script type="text/javascript">
    var app = angular.module("MyApp", []);

    app.controller("MyCtrl", function($scope,$http,$compile) {
        $scope.currentId = 0;
        
        $http.get("{{ url('/stock/'.$station->id.'/listStock') }}").success(function(response) {
            $scope.packages = response;
            //console.log($scope.stations);
        });
    });
</script>
@stop
