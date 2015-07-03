<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

	protected $table = "notifications";
        protected $fillable = ['title', 'message', 'vehicle_id', 'service_type_id','type','status'];
        
        public function client()
        {
            return $this->belongsTo('App\Client');
        }
        
        public function serviceType()
        {
            return $this->belongsTo('App\ServiceType');
        }
        
        public function vehicle()
        {
            return $this->belongsTo('App\Vehicle');
        }
        
}
