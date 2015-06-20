<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function(Blueprint $table)
		{
                    $table->increments('id');
                    
                    $table->string('name');
                    
                    $table->integer('make_id')->length(10)->unsigned()->nullable();
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
         Schema::table('models', function(Blueprint $table)
		{
			Schema::drop('models');
		});
    }
}
