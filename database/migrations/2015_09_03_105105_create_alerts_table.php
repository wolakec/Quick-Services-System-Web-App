<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function(Blueprint $table)
        {
                $table->increments('id');
                
                $table->integer('station_id')->length(10)->unsigned()->nullable();
                $table->integer('employee_id')->length(10)->unsigned()->nullable();
                
                $table->string('title');
                $table->string('message');
                
                $table->string('status');
                $table->string('type');
                    
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
        Schema::table('alerts', function(Blueprint $table)
        {
		Schema::drop('alerts');
        });
    }
}
