<?php

namespace App\Policies;

use App\User;
use App\Location;

class LocationPolicy
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
    
    public function add(User $user){
        if($user->isAdmin()){
            return true;
        }
    }
    
    public function store(User $user)
    {
        return $user->isAdmin();
    }
    
    public function edit(User $user, Location $location)
    {
        return $user->isAdmin();
    }
    
    public function update(User $user, Location $location)
    {
        return $user->isAdmin();
    }
        
}
