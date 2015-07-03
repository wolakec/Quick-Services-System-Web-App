<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultReminderPreference extends Model {

    protected $table = "default_reminder_preferences";
    protected $fillable = ['service_type_id','period'];
    
    public function type()
    {
        return $this->belongsTo('App\ServiceType','service_type_id');
    }

}
