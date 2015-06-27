<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StationServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_services', function(Blueprint $table)
		{
                    $table->increments('id');
                   
                    $table->integer('station_id')->length(10)->unsigned()->nullable();
                    $table->integer('service_types_id')->length(10)->unsigned()->nullable();
                    
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
        Schema::table('station_services', function(Blueprint $table)
		{
			Schema::drop('station_services');
		});
    }
}
