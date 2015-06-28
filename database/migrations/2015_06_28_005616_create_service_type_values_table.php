<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTypeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('service_type_values', function(Blueprint $table)
		{
                    $table->increments('id');
                    
                    $table->integer('service_type_id')->length(10)->unsigned()->nullable();
                    $table->integer('points');
                    
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
        Schema::table('service_type_values', function(Blueprint $table)
		{
			Schema::drop('service_type_values');
		});
    }
}
