<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Make;
use App\VehicleModel;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Station' => 'App\Policies\StationPolicy',
        'App\Reward' => 'App\Policies\RewardPolicy',
        'App\Employee' => 'App\Policies\EmployeePolicy',
        'App\Product' => 'App\Policies\ProductsPolicy',
        'App\Unit' => 'App\Policies\UnitPolicy',
        'App\Category' => 'App\Policies\CategoryPolicy',
        'App\Service' => 'App\Policies\ServicePolicy',
        'App\ServiceType' => 'App\Policies\ServicePolicy',
        'App\ServiceTypevalue' => 'App\Policies\ServicePolicy',
        'App\DefaultReminderPreference' => 'App\Policies\PreferencePolicy',
        

        
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);
        
        $gate->define('createNotifications', function($user){
            if($user->isAdmin()){
                return true;
            }else{
                return false;
            }
        });
        
        $gate->define('viewModels', function(User $user){
            return true;
        });
        
        $gate->define('viewMakes', function(User $user){
            return true;
        });
        
        $gate->define('addMake', function(User $user){
            return true;
        });
        
        $gate->define('addModel', function(User $user){
            return true;
        });
        
        $gate->define('editModel', function(User $user, VehicleModel $model){
            return $user->isAdmin();
        });
        
        $gate->define('editMake', function(User $user,Make $make){
            return $user->isAdmin();
        });
        
        $gate->define('addQr', function(User $user){
            return $user->isAdmin();
        });

        $gate->define('createproducts', function($user){
            if($user->isAdmin()){
                return true;
            }else{
                return false;
            }
        });
        
        $gate->define('createUnit', function($user){
            if($user->isAdmin()){
                return true;
            }else{
                return false;
            }
        });
        
        $gate->define('createCategory', function($user){
            if($user->isAdmin()){
                return true;
            }else{
                return false;
            }
        });
        $gate->define('createServiceValue', function($user){
            if($user->isAdmin()){
                return true;
            }else{
                return false;
            }
        });
        $gate->define('listStations', function($user){
            return $user->isAdmin();
        });
        $gate->define('addStation', function($user){
            return $user->isAdmin();
        });
        $gate->define('listEmployees', function($user){
            return $user->isAdmin();
        });
        $gate->define('addEmployee', function($user){
            return $user->isAdmin();
        });
        $gate->define('createServiceTypes', function($user){
            if($user->isAdmin()){
                return true;
            }else{
                return false;
            }
        });
        $gate->define('addPreference', function($user){
            if($user->isAdmin()){
                return true;
            }else{
                return false;
            }
        });
    }
}
