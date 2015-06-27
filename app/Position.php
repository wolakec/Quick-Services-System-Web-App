<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model {

    protected $table = "positions";
    protected $fillable = ['longitude','latitude','station_id'];
    
    public function station()
    {
        return $this->belongsTo('App\Station');
    }
}
