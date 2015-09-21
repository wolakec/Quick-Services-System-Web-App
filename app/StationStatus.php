<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StationStatus extends Model {

	protected $table = "station_status";
        protected $fillable = ['message', 'has_petrol', 'has_diesel', 'is_open'];
        
        public function station()
        {
            return $this->belongsTo('App\Station');
        }

}
