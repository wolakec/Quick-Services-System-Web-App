<?php

namespace App\Policies;
use App\User;
use App\Station;

class StationPolicy
{
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function before($user, $ability)
    {
        return $user->isAdmin();
    }
    
    public function edit(User $user, Station $station)
    {
        if($user->isAdmin()){
            return true;
        }
        return $user->employee->station_id === $station->id;
    }
    
    public function viewStock(User $user, Station $station)
    {
        if($user->isAdmin()){
            return true;
        }
        return $user->employee->station_id === $station->id;
    }
}
