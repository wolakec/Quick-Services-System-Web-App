<?php

namespace App\Http\Middleware;

use Closure;
//use LucaDegasperi\OAuth2Server\Authorizer;

class ResourceOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = (int)$request->route()->parameter('id');
        
        $ownerId = \Authorizer::getResourceOwnerId();
        
        if($id != $ownerId){
            echo "access denied";
            die();
        }
        
        if($id == $ownerId){
            return $next($request);
        }
        
    }
}
