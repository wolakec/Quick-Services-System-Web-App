<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model {

	protected $table = "stock";
        protected $fillable = ['status', 'quantity', 'warning_level', 'package_id'];
        protected $hidden = ['password'];
        
        public function station()
        {
            return $this->belongsTo('App\Station');
        }
        
        public function package()
        {
            return $this->belongsTo('App\Package');
        }


}
