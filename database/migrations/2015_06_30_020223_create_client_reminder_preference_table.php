<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientReminderPreferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_reminder_preferences', function(Blueprint $table)
		{
                    $table->increments('id');
                    
                    $table->integer('service_type_id')->length(10)->unsigned()->nullable();
                    $table->integer('client_id')->length(10)->unsigned()->nullable();
                    $table->integer('period');
                    
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
        Schema::table('client_reminder_preferences', function(Blueprint $table)
		{
			Schema::drop('client_reminder_preferences');
		});
    }
}
