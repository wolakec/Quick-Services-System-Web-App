<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model {

    protected $table = "stations";
    protected $fillable = ['name','address','location_id','phone_1'];

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
    
    public function transactionDetails()
    {
        return $this->hasManyThrough('App\TransactionDetail','App\Transaction','station_id','transaction_id');
    }
    
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
    
    public function location()
    {
        return $this->belongsTo('App\Location');
    }
    
    public function status()
    {
        return $this->belongsTo('App\StationStatus','station_status_id');
    }
    
    public function serviceTypes()
    {
        return $this->belongsToMany('App\ServiceType','station_services');
    }
    
    public function position()
    {
        return $this->hasOne('App\Position');
    }
}
