<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('transaction_id')->length(10)->unsigned();
			$table->integer('package_id')->length(10)->unsigned();
                        
                        $table->integer('quantity')->length(10)->unsigned();
                        $table->float('price');
                        $table->string('type');
                        
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
