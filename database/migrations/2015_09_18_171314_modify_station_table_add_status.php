<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyStationTableAddStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stations', function(Blueprint $table)
		{
                        $table->integer('station_status_id')->length(10)->unsigned()->nullable();
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
			$table->dropColumn('station_status_id');
		});
    }
}
