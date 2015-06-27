<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('positions', function(Blueprint $table)
		{
                    $table->increments('id');
                    
                    $table->double('longitude', 15, 8);
                    $table->double('latitude', 15, 8);
                    
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
        Schema::table('positions', function(Blueprint $table)
		{
			Schema::drop('positions');
		});
    }
}
