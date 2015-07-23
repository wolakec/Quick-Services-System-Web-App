<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model {
    
    protected $table = "packages";
    protected $fillable = ['product_id', 'unit_id', 'cost', 'base_price'];


    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

}
