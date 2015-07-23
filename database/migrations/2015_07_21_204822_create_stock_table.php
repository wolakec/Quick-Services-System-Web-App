<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock',function($table){
                   $table->increments('id');
                   
                   $table->string('status');

                   $table->integer('quantity')->length(10)->unsigned();
                   $table->integer('station_id')->length(10)->unsigned(); 
                   $table->integer('package_id')->length(10)->unsigned(); 
                   $table->integer('warning_level')->length(10)->unsigned(); 

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
        Schema::table('stock', function(Blueprint $table)
		{
			Schema::drop('stock');
		});
    }
}
