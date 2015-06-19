<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function(Blueprint $table)
		{
                    $table->increments('id');
                    $table->string('name');
                    $table->string('password', 60)->nullable();
                    
                    $table->string('email')->nullable();
                    $table->string('phone_1')->nullable();

                    $table->string('employee_id')->nullable();
                    
                    $table->integer('station_id')->length(10)->unsigned()->nullable();
                    $table->integer('location_id')->length(10)->unsigned()->nullable();
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
        Schema::table('employees', function(Blueprint $table)
		{
			Schema::drop('employees');
		});
    }
}
