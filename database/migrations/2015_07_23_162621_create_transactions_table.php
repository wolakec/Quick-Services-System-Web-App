<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function(Blueprint $table)
		{
                    $table->increments('id');
                    
                    $table->integer('client_id')->length(10)->unsigned()->nullable();
                    $table->integer('employee_id')->length(10)->unsigned()->nullable();
                    $table->integer('station_id')->length(10)->unsigned()->nullable();
                    
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
        //
    }
}
