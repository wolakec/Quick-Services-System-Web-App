@extends('layouts.default')

@section('content')
<h3 style="text-align: center;">{{ $station->name }} Station Stock</h3><br>
        <div class="container" ng-app="MyApp" ng-controller="MyCtrl">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-offset-11">
                        <a href="{{ url('/stock/'.$station->id.'/update') }}"/><button type="button" class="btn btn-success">Update</button></a></br></br>
                        </div>
                    
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
                                </tr>
                            
                            </tbody>
                        </table>
                        
                    </form>
                </div>
                
                    
            </div>
        </div>
<script type="text/javascript">
    var app = angular.module("MyApp", []);

    app.controller("MyCtrl", function($scope,$http,$compile) {
        
        $http.get("{{ url('/stock/'.$station->id.'/listStock') }}").success(function(response) {
            $scope.packages = response;
            //console.log($scope.stations);
        });
    });
</script>
@stop
