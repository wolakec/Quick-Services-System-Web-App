@extends('layouts.default')

@section('content')
<h3 style="text-align: center;">{{ $station->name }} Station Stock Warnings</h3><br>
        <div class="container" ng-app="MyApp" ng-controller="MyCtrl">
            <div class="row">
                <div class="col-md-12">
                    <form name="stockForm" method="post" action="{{ url('/stock/'.$station->id.'/warnings/update') }}"/>
                        <table class="table table-bordered" id="StockTable">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Package</th>
                                    <th>Specification</th>
                                    <th>Current Warning</th>
                                    <th>New Warning</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr ng-repeat="package in packages"
                                    ng-style="package.quantity <= package.warning_level && {'background-color': 'PaleGoldenRod'}"
                                    >
                                    <td>@{{ package.category_name}}</td>
                                    <td>@{{ package.id }}</td>
                                    <td>@{{ package.code}}</td>
                                    <td>@{{ package.name }}</td>
                                    <td>@{{ package.unit_name }}</td>
                                    <td>@{{ package.specification }}</td>
                                    <td>@{{ package.warning_level }}</td>
                                    <td><input type="text" name="package[@{{package.id}}][warning_level]" ng-model="package.warning_level" value="@{{ package.warning_level }}"/></td>
                                </tr>
                            
                            </tbody>
                        </table>
                        <div class="col-md-offset-10">
                            <div class="container">
                                <a href="{{ url('/stock/'.$station->id) }}"/><button type="button" class="btn btn-warning">Cancel</button></a>
                                <button type="submit" value="submit" name="submit" class="btn btn-success">Save</button>
                            </div>
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
