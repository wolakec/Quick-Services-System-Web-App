<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class QrCode extends Model {

    protected $table = "qr_codes";
    protected $fillable = ['body'];
    
    public function vehicles()
    {
        return $this->hasOne('App\Vehicles');
    }
}
