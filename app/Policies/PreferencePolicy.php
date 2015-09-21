<?php

namespace App\Policies;

use App\User;
use App\DefaultReminderPreference;

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
        return $user->isAdmin();
    }
    
    public function store(User $user){
        return $user->isAdmin();
    }
    
    public function edit(User $user, DefaultReminderPreference $preference)
    {
        return $user->isAdmin();
    }
    
    public function update(User $user, DefaultReminderPreference $preference)
    {
        return $user->isAdmin();
    }
}
