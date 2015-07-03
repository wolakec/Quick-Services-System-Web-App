<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	protected $table = "clients";
        protected $fillable = ['name', 'email', 'location_id'];
        protected $hidden = ['password'];
        
        public function location()
        {
            return $this->belongsTo('App\Location');
        }
        
        public function vehicles()
        {
            return $this->hasMany('App\Vehicle');
        }
        
        public function services()
        {
            return $this->hasManyThrough('App\Service','App\Vehicle');
        }
        
        public function notifications()
        {
            return $this->hasMany('App\Notification');
        }


}
