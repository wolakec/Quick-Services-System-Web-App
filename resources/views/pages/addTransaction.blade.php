@extends('layouts.default')

@section('content')     
        <div class="container" ng-app="MyApp" ng-controller="TransactionFormController">
            <div class="row">
            <form class="form-horizontal" method='post' action='{{ url('/transactions/add') }}'>    
                <h4> Add New Transaction </h4><br>
            <fieldset class="col-lg-12">
                <div class="form-group">
                    <table class="line-form-hack">
                        <tr>
                            <th>Package</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        <fieldset>
                            <tr ng-repeat="package in packages">
                                <td>
                                    <select                                      
                                        ng-model="package.selectedPackage" 
                                        ng-options="value.product.name + ' ' + value.unit.name for value in products"
                                        class="form-control"                      
                                    >
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="price" ng-model="package.selectedPackage.base_price" ng-init="package.selectedPackage.base_price = 0">
                                </td>
                                 <td>
                                    <input type="text" class="form-control" id="quantity" ng-model="package.quantity" ng-init="package.quantity = 1">
                                </td>
                                 <td>
                                    @{{ (package.selectedPackage.base_price * package.quantity) }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    
                                </td>
                            </tr>
                        </fieldset>
                    </table>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="control-label"></label>
                    <div>
                            <button type="button" ng-click="addPackage()"class="btn btn-default">Add Item</button>
                    </div>
                </div>
                </fieldset>
            </form>
            </div>
<script type="text/javascript">
    var app = angular.module("MyApp", []);

    app.controller('TransactionFormController',function($scope,$http){
      
        $scope.packages = [{}];
        
        $scope.addPackage = function(){
            $scope.packages.push({})
        }
        
        $http.get("/product/packages").success(function(response) {
            $scope.products = response;
        });
    });

</script>
           
@stop