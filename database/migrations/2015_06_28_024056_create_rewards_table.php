<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewards', function(Blueprint $table)
		{
                    $table->increments('id');
                    
                    $table->text('title');
                    $table->text('description');
                    $table->integer('cost');
                    
                    
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
        Schema::table('rewards', function(Blueprint $table)
		{
			Schema::drop('rewards');
		});
    }
}
