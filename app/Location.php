<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

    protected $table = "locations";
    protected $fillable = ['name'];
    
    public function stations()
    {
        return $this->hasMany('App\Stations');
    }
    
    public function clients()
    {
        return $this->hasMany('App\Clients');
    }

}
