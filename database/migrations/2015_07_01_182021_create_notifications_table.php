<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function(Blueprint $table)
		{
                    $table->increments('id');
                    
                    $table->string('title');
                    $table->string('message');
                            
                    $table->integer('client_id')->length(10)->unsigned()->nullable();
                    $table->integer('vehicle_id')->length(10)->unsigned()->nullable();
                    $table->integer('service_type_id')->length(10)->unsigned()->nullable();
                    
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
        Schema::table('notifications', function(Blueprint $table)
		{
			Schema::drop('notifications');
		});
    }
}
