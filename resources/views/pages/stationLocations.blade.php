@extends('layouts.maps')

@section('content')
<style type="text/css">
    .angular-google-map-container { height: 400px; }
</style>
<div class="container" ng-app="myApp" ng-controller="MapController">
    <div class="col-md-12">
        <h4 style="text-align: center;">Station Locations</h4><br/>
        <div class="col-md-4">
            <div class="form-group">
                        <label>Select station</label>
                        <select name="station_id" class="form-control" ng-model="currentStation"
                                ng-options="station.name for station in stations">
                           
                        </select>
            </div>
            <div class="form-group">                      
                <button type="button" class="btn btn-default" ng-click="addStation(long,lat); showsave = true; removeOption(currentStation)" ng-show="currentStation != ''"> Create Marker</button>
                </br></br>
                <div class="form-group" ng-show="currentStation != ''">
                    <label>Longitude</label><input class="form-control" type="number"  ng-model="long"/></br>
                    <label>Latitude</label><input class="form-control" type="number" ng-model="lat"/>
                </div>
                <button class="btn btn-success" type="button" ng-click="savePositions()" ng-show="showsave == true">Save</button>
                @{{ message }}
            </div>
            
            <div class="form-group" ng-show="currentStation != ''">
                <h3>Station Information</h3>
                Name: @{{ currentStation.name }} </br>
                Address: @{{ currentStation.address }} </br>
                Phone: @{{ currentStation.phone_1 }} </br>
               
            </div>
        </div>
        <ui-gmap-google-map center='map.center' zoom='map.zoom'>
            <ui-gmap-marker ng-repeat='marker in markers'
                           coords="marker.coords"
                           idKey="marker.id"
                           options="marker.options"
                           events="markerEvents"
                            >
                
            </ui-gmap-marker>
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
        $scope.showsave = false;

        $scope.stations = [];
        $scope.currentStation = "";
        $scope.message = "";
        
        $scope.customPosition = false;
        
        $scope.long = 32.529831;
        $scope.lat = 15.564836;
        
        $scope.markerEvents = {
            dragstart: function(marker){
                $scope.showsave = true;
                $scope.message = "";
            }
        }
        
        uiGmapGoogleMapApi.then(function(maps) {
            $scope.map = { center: { latitude: 15.564836, longitude: 32.529831 }, zoom: 12};
            
        });
        
        $http.get("{{ url('/stations/positions/all') }}").success(function(response) {
            //$scope.markers = response;
            angular.forEach(response, function(m,key){
                $scope.markers.push({
                    id: m.id,
                    options: {
                        labelContent: m.name,
                        draggable: true,
                    },
                    coords: {
                        longitude: m.longitude,
                        latitude: m.latitude,
                    }
                });
            }); 
        });
        
        $scope.addStation = function(long,lat){
            var station = {
                id: $scope.currentStation.id,

                    options: {
                        labelContent: $scope.currentStation.name,
                        draggable: true,
                    },
                    coords: {
                        longitude: long,
                        latitude: lat,
                    }
            };
            
            $scope.markers.push(station);
        };
        
        $scope.removeOption = function(station){
            var index = $scope.stations.indexOf(station);
            $scope.stations.splice(index, 1);
            $scope.currentStation = "";
        };
        
        $http.get("{{ url('/stations/map/noPosition/') }}").success(function(response) {
            $scope.stations = response;
            //console.log($scope.stations);
        });
        
        $scope.savePositions = function(){ 
            $scope.showsave = false;
            var request = $http({
                method: "post",
                url: "/stations/map/save",
                
                data: {
                    markers: $scope.markers,
                }
            }).success(function(response){
                $scope.message = response.message;
            });
        }
    });
        
</script>

@stop