<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyStationServicesAddAvailibility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('station_services', function(Blueprint $table)
		{
			$table->boolean('is_available');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('station_services', function(Blueprint $table)
		{
			$table->dropColumn('is_available');
		});
    }
}
