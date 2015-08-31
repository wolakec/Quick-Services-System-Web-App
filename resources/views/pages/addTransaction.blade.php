@extends('layouts.default')

@section('content')     
        <div class="container" ng-app="MyApp" ng-controller="TransactionFormController">
            <div class="row">
            <form class="form-horizontal" method='post' action='{{ url('/transactions/add') }}'>    
                <h4> Add New Transaction </h4><br>
            <div class="col-md-12">
                <div class="form-group">
                    <table class="table table-bordered">
                        <thead>
                            <th>Package</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </thead>
                        
                            <tbody>
                            <tr ng-repeat="package in packages">
                                <td>
                                    <select                                      
                                        ng-model="package.selectedPackage" 
                                        ng-options="value.product.name + ' ' + value.unit.name for value in products track by value.id"
                                        class="form-control"
                                        ng-change="calculatePrice(package); calculateTotal()"
                                        
                                    >
                                    </select>
                                </td>
                                <td ng-init="package.selectedPackage.base_price = 0; package.price=0;">
                                    @{{ package.selectedPackage.base_price }}
                                </td>
                                 <td>
                                     <input type="hidden" name="packages[@{{ $index }}][id]" value="@{{ package.selectedPackage.id }}"/>
                                    <input type="text" class="form-control" id="quantity" name="packages[@{{ $index }}][quantity]" ng-model="package.quantity" ng-change="calculatePrice(package); calculateTotal()" ng-init="package.quantity = 1">
                                </td>
                                 <td>
                                    @{{ "£"+package.price }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    @{{ "£"+totalPrice }}
                                </td>
                            </tr>
                            <tbody>
                        
                    </table>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="control-label"></label>
                    <div>
                            <button type="button" ng-click="addPackage(); calculateTotal()"class="btn btn-default">Add Item</button>
                            <button type="submit" class="btn btn-primary">Process Transaction</button>
                    </div>
                </div>
                </div>
            </form>
            </div>
<script type="text/javascript">
    var app = angular.module("MyApp", []);

    app.controller('TransactionFormController',function($scope,$http){
      
        $scope.packages = [{}];
        $scope.totalPrice = 0;
        $scope.addPackage = function(){
            $scope.packages.push({})
        }
        
        $scope.calculateTotal = function(){
            count = 0; 
            angular.forEach($scope.packages,function(value,index){
                if(value.price != null){
                    count += value.price;
                }
            });
            $scope.totalPrice = count;
        }
        
        $scope.calculatePrice = function(package){
            package.price = package.selectedPackage.base_price * package.quantity;
        }
        
        $http.get("/product/packages").success(function(response) {
            $scope.products = response;
        });
    });

</script>
           
@stop