<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model {

	protected $table = "alerts";
        protected $fillable = ['title', 'message', 'station_id', 'employee_id','package_id','type','status'];
        
        public function employee()
        {
            return $this->belongsTo('App\Employee');
        }
        
        public function package()
        {
            return $this->belongsTo('App\Package');
        }
        
        public function station()
        {
            return $this->belongsTo('App\Station');
        }
}
