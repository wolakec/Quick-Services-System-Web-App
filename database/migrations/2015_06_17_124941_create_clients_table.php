<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function(Blueprint $table)
		{
                    $table->increments('id');
                    
                    $table->string('password', 60);
                    $table->string('address')->nullable();
                    $table->string('email')->nullable();
                    $table->string('name');
                    
                    $table->integer('location_id')->length(10)->unsigned()->nullable();
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
        Schema::table('clients', function(Blueprint $table)
		{
			Schema::drop('clients');
		});
    }
}
