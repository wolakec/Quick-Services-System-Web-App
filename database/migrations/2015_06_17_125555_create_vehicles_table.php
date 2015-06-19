<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function(Blueprint $table)
		{
                    $table->increments('id');
                    $table->string('type')->nullable();
                    $table->string('model')->nullable();
                    $table->string('fuel')->nullable();

                    $table->integer('client_id')->length(10)->unsigned()->nullable();
                    
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
        Schema::table('vehicles', function(Blueprint $table)
		{
			Schema::drop('vehicles');
		});
    }
}
