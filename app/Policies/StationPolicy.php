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
    
    public function addStation(User $user)
    {
        return $user->isAdmin();
    }
    
    public function storeStation(User $user)
    {
        return $user->isAdmin();
    }
    
    public function edit(User $user, Station $station)
    {
        return $user->isAdmin();
    }
    
    public function update(User $user, Station $station)
    {
        return $user->isAdmin();
    }
    
    public function viewStock(User $user, Station $station)
    {
        if($user->isAdmin()){
            return true;
        }
        return $user->employee->station_id === $station->id;
    }
    
    public function view(User $user, Station $station)
    {
        if($user->isAdmin()){
            return true;
        }
        return $user->employee->station_id === $station->id;
    }
}
