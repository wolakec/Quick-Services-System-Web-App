<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, AuthorizableContract
{
    use Authenticatable, CanResetPassword, Authorizable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    public function roles()
    {
        return $this->belongsToMany('App\Role','user_roles');
    }
    
    public function employee()
    {
        return $this->hasOne('App\Employee');
    }
    
    /*
     * Role functions
     */
    
    public function hasRole($role)
    {
        foreach($this->roles as $userRole){
            if($userRole->name == $role){
                return true;
            }
        }
        return false;
    }
    
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
    
    public function isEmployee()
    {
        return $this->hasRole('station_employee');
    }
     
}
