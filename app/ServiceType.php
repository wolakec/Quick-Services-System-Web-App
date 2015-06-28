<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model {

    protected $table = "service_types";
    protected $fillable = ['name'];
    
    public function services()
    {
        return $this->hasMany('App\Services');
    }
    
    public function value()
    {
        return $this->hasOne('App\ServiceTypeValue');
    }

}
