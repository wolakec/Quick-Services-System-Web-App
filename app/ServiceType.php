<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model {

    protected $table = "service_types";
    protected $fillable = ['name'];
    
    public function services()
    {
        return $this->hasMany('App\Services');
    }
    
    public function stations()
    {
        return $this->belongsToMany('App\Station','station_services');
    }
    
    public function value()
    {
        return $this->hasOne('App\ServiceTypeValue');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category','service_type_categories');
    }
    
//    public function products()
//    {
//        return $this->hasManyThrough('App\Product','App\Category','service_type_categories');
//    }
}
