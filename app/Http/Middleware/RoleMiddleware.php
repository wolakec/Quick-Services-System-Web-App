<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{

    public function handle($request, Closure $next, $role)
    {
        $user = $request->user();
        $user->load('roles');
        
        foreach($user->roles as $userRole){
            if($userRole->name == $role){
                return $next($request);
            }
        }
        
        return redirect('/');
    }
}
