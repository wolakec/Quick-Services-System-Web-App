<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

	protected $table = "transactions";
        protected $fillable = ['client_id'];

        
        public function details()
        {
            return $this->hasMany('App\TransactionDetail');
        }
        
        public function client()
        {
            return $this->belongsTo('App\Client');
        }
        
        public function employee()
        {
            return $this->belongsTo('App\Employee');
        }
        
        public function station()
        {
            return $this->belongsTo('App\Station');
        }
}
