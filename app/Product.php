<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = "products";
        
        protected $fillable = ['code', 'name', 'specification', 'category_id', 'description'];

        public function category() 
        {
               return $this->belongsTo('App\Category','category_id');
        }
        
        public function packages() 
        {
               return $this->hasMany('App\Package', 'product_id');
        }  
        
}

 
