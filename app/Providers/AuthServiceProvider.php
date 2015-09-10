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

    }
}