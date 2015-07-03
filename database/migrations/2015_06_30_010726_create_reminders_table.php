<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function(Blueprint $table)
		{
                    $table->increments('id');
                    
                    $table->integer('service_type_id')->length(10)->unsigned()->nullable();
                    $table->integer('vehicle_id')->length(10)->unsigned()->nullable();
                    
                    $table->boolean('triggered');
                    
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
        Schema::table('reminders', function(Blueprint $table)
		{
			Schema::drop('reminders');
		});
    }
}
