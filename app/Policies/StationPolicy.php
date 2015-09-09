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
        if ($user->isAdmin()) {
            return true;
        }
    }
    
    public function edit(User $user, Station $station)
    {
        //return $user->isAdmin();
        return $user->employee->station_id === $station->id;
   
    }
}
