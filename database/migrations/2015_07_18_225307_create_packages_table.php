<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->length(10)->unsigned();
			$table->integer('unit_id')->length(10)->unsigned();
                        $table->float('cost');
                        $table->float('base_price');
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
        Schema::table('packages', function(Blueprint $table)
		{
			Schema::drop('packages');
		});
    }
}
