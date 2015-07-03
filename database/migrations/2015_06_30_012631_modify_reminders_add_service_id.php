<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyRemindersAddServiceId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('reminders', function(Blueprint $table)
		{
                     $table->integer('service_id')->length(10)->unsigned()->nullable();
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
			$table->dropColumn('service_id');
		});
    }
}
