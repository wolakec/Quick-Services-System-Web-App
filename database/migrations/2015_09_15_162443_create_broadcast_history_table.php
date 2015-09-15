<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroadcastHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broadcast_history', function(Blueprint $table)
		{
                    $table->increments('id');
                    
                    $table->string('title');
                    $table->string('message');
                            
                    $table->integer('user_id')->length(10)->unsigned()->nullable();
                    
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
        Schema::table('broadcast_history', function(Blueprint $table)
		{
			Schema::drop('broadcast_history');
		});
    }
}
