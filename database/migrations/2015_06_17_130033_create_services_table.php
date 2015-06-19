<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('services', function(Blueprint $table)
		{
                    $table->increments('id');
                    $table->float('price')->nullable();

                    $table->integer('vehicle_id')->length(10)->unsigned()->nullable();
                    $table->integer('service_type_id')->length(10)->unsigned()->nullable();
                    $table->integer('station_id')->length(10)->unsigned()->nullable();
                    
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
        Schema::table('services', function(Blueprint $table)
		{
			Schema::drop('services');
		});
    }
}
