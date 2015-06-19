<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('stations', function(Blueprint $table)
		{
                    $table->increments('id');

                    $table->string('name');
                    $table->string('address');
                    $table->integer('location_id')->length(10)->unsigned()->nullable();
                    $table->string('phone_1')->nullable();
                    
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
       Schema::table('stations', function(Blueprint $table)
		{
			Schema::drop('stations');
		});
    }
}
