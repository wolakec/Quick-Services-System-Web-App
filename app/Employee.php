<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

	protected $table = "employees";
        protected $fillable = ['name', 'address', 'phone_1', 'location_id', 'employee_id','station_id'];
        protected $hidden = ['password'];
        
        public function location()
        {
            return $this->belongsTo('App\Location');
        }
        
        public function station()
        {
            return $this->belongsTo('App\Station');
        }

        public function user()
        {
            return $this->belongsTo('App\User');
        }

}
