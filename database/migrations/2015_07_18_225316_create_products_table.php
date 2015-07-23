<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('products',function($table){
                   $table->increments('id');
                   $table->string('name');
                   $table->string('code');
                   $table->string('specification');
                   $table->integer('category_id')->length(10)->unsigned();               
                   $table->text('description');
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
        Schema::table('products', function(Blueprint $table)
		{
			Schema::drop('products');
		});
    }
}
