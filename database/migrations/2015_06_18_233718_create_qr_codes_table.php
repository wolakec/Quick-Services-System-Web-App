<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQrCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qr_codes', function(Blueprint $table)
		{
                    $table->increments('id');
                   
                    $table->string('body');
                    
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
        Schema::table('qr_codes', function(Blueprint $table)
		{
			Schema::drop('qr_codes');
		});
    }
}
