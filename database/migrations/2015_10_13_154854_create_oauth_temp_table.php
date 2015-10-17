<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOauthTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_temp', function(Blueprint $table)
		{
                    $table->increments('id');
                    $table->string('email');                    
                    $table->string('client_id');
                    $table->boolean('processed');
                    $table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oauth_temp', function(Blueprint $table)
		{
			Schema::drop('oauth_temp');
		});
    }
}
