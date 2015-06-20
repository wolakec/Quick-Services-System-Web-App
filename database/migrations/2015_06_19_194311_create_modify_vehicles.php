<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifyVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function ($table) {
            $table->dropColumn('type');
            $table->dropColumn('model');
            
            $table->integer('model_id')->length(10)->unsigned()->nullable();
            $table->string('year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('year');
        $table->dropColumn('model_id');
        
        $table->string('type')->nullable();
        $table->string('model')->nullable();
    }
}
