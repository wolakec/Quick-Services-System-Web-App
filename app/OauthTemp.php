<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthTemp extends Model {

	protected $table = "oauth_temp";
        protected $fillable = ['username', 'client_id'];
       
}
