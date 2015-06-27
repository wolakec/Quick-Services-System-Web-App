<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyStationServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('station_services', function ($table) {
            $table->dropColumn('service_types_id');

            $table->integer('service_type_id')->length(10)->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('station_services', function ($table) {
            $table->dropColumn('service_type_id');

            $table->integer('service_types_id')->length(10)->unsigned()->nullable();
        });
    }
}
