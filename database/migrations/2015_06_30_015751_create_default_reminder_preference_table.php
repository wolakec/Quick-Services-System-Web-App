<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultReminderPreferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_reminder_preferences', function(Blueprint $table)
		{
                    $table->increments('id');
                    
                    $table->integer('service_type_id')->length(10)->unsigned()->nullable();
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
        Schema::table('default_reminder_preferences', function(Blueprint $table)
		{
			Schema::drop('default_reminder_preferences');
		});
    }
}
