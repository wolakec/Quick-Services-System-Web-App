<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReminderPreference extends Model {

    protected $table = "client_reminder_preferences";
    protected $fillable = ['service_type_id','client_id','period'];
    
    public function type()
    {
        return $this->belongsTo('App\ServiceType','service_type_id');
    }
    
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

}
