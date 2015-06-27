<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {

	protected $table = "vehicles";
        protected $fillable = ['model_id', 'fuel', 'client_id', 'qr_code_id','year'];
        
        public function client()
        {
            return $this->belongsTo('App\Client');
        }
        
        public function services()
        {
            return $this->hasMany('App\Service');
        }
        
        public function qrCode()
        {
            return $this->belongsTo('App\QrCode');
        }
        
        public function model()
        {
            return $this->belongsTo('App\VehicleModel');
        }
}
