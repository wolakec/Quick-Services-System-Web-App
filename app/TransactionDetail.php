<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model {

	protected $table = "transaction_details";
        protected $fillable = ['quantity','price','type','package_id'];
  
        public function transaction()
        {
            return $this->belongsTo('App\Transaction');
        }
        
        public function package()
        {
            return $this->belongsTo('App\Package');
        }
        
}
