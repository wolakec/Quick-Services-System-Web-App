<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCreateStationStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('station_status', function(Blueprint $table)
		{
			$table->dropColumn('station_id');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('station_status', function(Blueprint $table)
		{
                        $table->integer('station_id')->length(10)->unsigned()->nullable();
		});
    }
}
