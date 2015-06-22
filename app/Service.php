<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	protected $table = "services";
        protected $fillable = ['price', 'vehicle_id', 'service_type_id', 'station_id'];
        
        public function vehicle()
        {
            return $this->belongsTo('App\Vehicle');
        }
        
        public function station()
        {
            return $this->belongsTo('App\Station');
        }
        
        public function type()
        {
            return $this->belongsTo('App\ServiceType','service_type_id');
        }
        
        public function employee()
        {
            return $this->belongsTo('App\Employee');
        }

}
