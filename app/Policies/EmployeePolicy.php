<?php

namespace App\Policies;

use App\User;
use App\Employee;

class EmployeePolicy
{
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    public function index(User $user)
    {
       return $user->isAdmin();
    }
    
    public function add(User $user)
    {
       return $user->isAdmin();
    }
    
    public function view(User $user,Employee $employee)
    {
       return $user->isAdmin();
    }
    
    public function edit(User $user,Employee $employee)
    {
       return $user->isAdmin();
    }
    
    public function update(User $user,Employee $employee)
    {
       return $user->isAdmin();
    }
    
}
