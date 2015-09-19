<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_status', function(Blueprint $table)
		{
                    $table->increments('id');

                    $table->text('message');
                    
                    $table->boolean('has_petrol');
                    $table->boolean('has_diesel');
                    $table->boolean('is_open');
                            
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
        Schema::table('station_status', function(Blueprint $table)
		{
			Schema::drop('station_status');
		});
    }
}
