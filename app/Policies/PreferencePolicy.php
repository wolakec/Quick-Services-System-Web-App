<?php

namespace App\Policies;

class PreferencePolicy
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
}
