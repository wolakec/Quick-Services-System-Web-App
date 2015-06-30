<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceTypeValue extends Model {

    protected $table = "service_type_values";
    protected $fillable = ['service_type_id','points'];
    
    public function type()
    {
        return $this->belongsTo('App\ServiceType','service_type_id');
    }

}
