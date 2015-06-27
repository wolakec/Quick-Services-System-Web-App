<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model {

    protected $table = "stations";
    protected $fillable = ['name','address','location_id','phone_1'];

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
    
    public function location()
    {
        return $this->belongsTo('App\Location');
    }
    
    public function serviceTypes()
    {
        return $this->belongsToMany('App\ServiceType','station_services');
    }
}
