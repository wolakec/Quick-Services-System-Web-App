<?php

namespace App\Policies;
use App\Product;
use App\User;

class ProductsPolicy
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
    public function edit(User $user,Product $product){
        
        if($user->isAdmin()){
            return true;
        }
    }
    
}
