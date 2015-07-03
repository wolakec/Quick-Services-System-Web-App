<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model {

    protected $table = "reminders";
    protected $fillable = ['service_type_id','service_id','vehicle_id','trigger_date','triggered'];
   
    public function serviceType()
    {
        return $this->belongsTo('App\ServiceType');
    }
    
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
    
    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }
}
