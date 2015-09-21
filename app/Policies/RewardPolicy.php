<?php

namespace App\Policies;
use App\User;
use App\Reward;

class RewardPolicy
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
    
    public function view(User $user)
    {
        
    }
    
    public function addReward(User $user)
    {
        return $user->isAdmin();
    }
    
    public function edit(User $user, Reward $reward)
    {
        return $user->isAdmin();
    }
}
