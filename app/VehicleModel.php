<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model {

    protected $table = "models";
    protected $fillable = ['name','make_id'];
    
    public function make()
    {
        return $this->belongsTo('App\Make');
    }
}
