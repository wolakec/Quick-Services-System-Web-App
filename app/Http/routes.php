<?php
use App\Client;
use App\Location;
use App\Make;
use App\VehicleModel;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/locations','LocationController@index');
Route::post('/locations/add', 'LocationController@store');
Route::get('/locations/{id})', 'LocationController@view');
Route::get('/locations/{id}/edit', 'LocationController@edit');
Route::post('/locations/{id}/edit', 'LocationController@update');

Route::get('/services','ServiceController@index');

Route::get('/services/types','ServiceTypesController@index');
Route::post('/services/types/add', 'ServiceTypesController@store');
Route::get('/services/types/{id})', 'ServiceTypesController@view');
Route::get('/services/types/{id}/edit', 'ServiceTypesController@edit');
Route::post('/services/types/{id}/edit', 'ServiceTypesController@update');

Route::get('/services/values','ServiceTypeValuesController@index');
Route::get('/services/values/add', 'ServiceTypeValuesController@add');
Route::post('/services/values/add', 'ServiceTypeValuesController@store');

Route::get('/services/preferences','DefaultReminderPreferencesController@index');
Route::get('/services/preferences/add', 'DefaultReminderPreferencesController@add');
Route::post('/services/preferences/add', 'DefaultReminderPreferencesController@store');

Route::get('/rewards','RewardController@index');
Route::get('/rewards/add', 'RewardController@add');
Route::post('/rewards/add', 'RewardController@store');
Route::get('/rewards/{id}/edit', 'RewardController@edit');
Route::post('/rewards/{id}/edit', 'RewardController@update');

Route::get('/makes','MakeController@index');
Route::post('/makes/add', 'MakeController@store');
Route::get('/makes/{id})', 'MakeController@view');
Route::get('/makes/{id}/edit', 'MakeController@edit');
Route::post('/makes/{id}/edit', 'MakeController@update');

Route::get('/models','ModelController@index');
Route::get('/models/add', 'ModelController@add');
Route::post('/models/add', 'ModelController@store');
Route::get('/models/{id})', 'ModelController@view');
Route::get('/models/{id}/edit', 'ModelController@edit');
Route::post('/models/{id}/edit', 'ModelController@update');

Route::get('/employees','EmployeeController@index');
Route::get('/employees/add', 'EmployeeController@add');
Route::post('/employees/add', 'EmployeeController@store');
Route::get('/employees/{id})', 'EmployeeController@view');
Route::get('/employees/{id}/edit', 'EmployeeController@edit');
Route::post('/employees/{id}/edit', 'EmployeeController@update');

Route::get('/codes','CodeController@index');
Route::get('/codes/add', 'CodeController@add');
Route::post('/codes/add', 'CodeController@store');
Route::get('/codes/{id})', 'CodeController@view');
Route::get('/codes/test/{id}', 'CodeController@test');
Route::get('/codes/{id}/edit', 'CodeController@edit');
Route::post('/codes/{id}/edit', 'CodeController@update');

Route::get('/stations','StationController@index');
Route::get('/stations/add', 'StationController@add');
Route::post('/stations/add', 'StationController@store');
Route::get('/stations/{id})', 'StationController@view');
Route::get('/stations/{id}/edit', 'StationController@edit');
Route::post('/stations/{id}/edit', 'StationController@update');
Route::get('/stations/{id}/employees', 'StationController@viewEmployees');
Route::get('/stations/{id}/services/types', 'StationController@viewServiceTypes');

Route::get('/stations/{id}/map', 'MapController@view');
Route::post('/stations/{id}/position', 'MapController@store');

Route::get('/reminders/scan','GenerateReminderController@scan');
        
/*
 * General Route for Mobile API
 */
Route::group(['prefix' => '/api'], function(){
    /*
     * Route for version one of API
     */
    Route::group(['prefix' => '/v1'], function(){
        /*
         * This route is used for all client actions
         */
        Route::group(['prefix' => '/client'], function(){
            /*
             * Client Registration
             */
            Route::post('/register','AppClientController@store');
            Route::post('/{id}/changepass','AppEmployeeController@changePass');
            /*
             * Client Login
             */
            Route::post('/login','AppClientController@login');
            Route::get('/locations',function(){
                return Location::all();
            });
           
            
            Route::get('/{id}/vehicles','AppVehicleController@view');
            Route::get('/{id}/services/types','AppClientController@viewServiceTypes');
            Route::get('/{id}/services','AppClientController@viewServices');
            Route::get('/stations/positions','AppClientController@viewStationPositions');
            Route::get('/rewards','AppRewardsController@viewRewards');
            Route::get('{id}/points','AppPointsController@viewPoints');
            
            Route::post('{id}/preferences/reminders','AppReminderPreferencesController@store');
            
            Route::get('{id}/notifications','AppNotificationController@viewNotifications');
            
        });
        
        Route::group(['prefix' => '/employee'], function(){
            /*
             * Employee Login
             */
            Route::post('/login','AppEmployeeController@login');
            Route::post('/{id}/changepass','AppEmployeeController@changePass');
            /*
             * Fetching vehicle lookup data
             */
            
            Route::get('/makes',function(){
                return Make::all();
            });
            Route::get('/models',function(){
                return VehicleModel::all();
            });
            Route::get('/{id}/services/types','AppEmployeeController@viewServiceTypes');
            Route::post('/{id}/services/add','AppServicesController@store');
            
            Route::post('/{id}/vehicles/add','AppVehicleController@store');
            
        });
    });
});
