<?php

namespace App\Policies;

class StockPolicy
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
            //return true;
        }
    }
    
    public function view(User $user, Station $station)
    {
        return $user->employee->station_id === $station->id;
    }
}
