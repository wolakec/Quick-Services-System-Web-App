@extends('layouts.maps')

@section('content')
<style type="text/css">
    .angular-google-map-container { height: 400px; }
</style>
<div class="container" ng-app="myApp" ng-controller="MapController" ng-init="stationId = {{ $stationId }}">
    <div>
        <button type="button" ng-click="addStation(); showsave = true;">Add Station</button>
        <button type="button" ng-click="savePosition()" ng-show="showsave == true">Save</button>
    </div>
    <div class="col-md-12">
        <h4 style="text-align: center;">Choose Location</h4><br/>
        <ui-gmap-google-map center='map.center' zoom='map.zoom'>
            <ui-gmap-markers models="markers" coords="'self'" options="wol" click="test()">
            </ui-gmap-markers>
        </ui-gmap-google-map>
    </div>
</div>

<script type="text/javascript">
    var app = angular.module('myApp', ['uiGmapgoogle-maps']).config(function(uiGmapGoogleMapApiProvider) {
        uiGmapGoogleMapApiProvider.configure({
            //    key: 'your api key',
            v: '3.17',
            libraries: 'weather,geometry,visualization'
        });
    }).controller('MapController', function($scope, uiGmapGoogleMapApi, $http) {
        $scope.markers = [];
        $scope.positions = [];
        $scope.showSave = false;
        uiGmapGoogleMapApi.then(function(maps) {
            $scope.map = { center: { latitude: 15.564836, longitude: 32.529831 }, zoom: 12};
            
        });
        
        $scope.wol = { draggable: true};
        var count = 0;
        
        $scope.test = function(){
            console.log("now");
        }
        
        $scope.addStation = function(){
            var station = {
            id: count,
           
              draggable: true,
            
                latitude: 15.564836, 
                longitude: 32.529831,
            
            
            title: 'test',
            label: 'Now',
            }
            $scope.markers.push(station);
            count++;
        }
        
        $scope.savePosition = function(){
            console.log($scope.markers[0]);
            console.log($scope.stationId);
            
            var position = $scope.markers[0];
            position['station_id'] = $scope.stationId;
            
            var request = $http({
                method: "post",
                url: "/stations/" + $scope.stationId + "/position",
                
                data: {
                    position: position,
                }
            });
        }
    });
</script>

@stop