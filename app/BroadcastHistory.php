<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BroadcastHistory extends Model {

	protected $table = "broadcast_history";
        protected $fillable = ['title', 'message'];
        
        public function user()
        {
            return $this->belongsTo('App\User');
        }

}
