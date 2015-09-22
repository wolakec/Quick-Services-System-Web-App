<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()    
     {
        Schema::create('company_info', function(Blueprint $table)
		{
                    $table->increments('id');
                    $table->text('name');
                    $table->text('email');                    
                    $table->text('telephone');
                    $table->text('fax');
                    $table->text('location');
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
        Schema::table('company_info', function(Blueprint $table)
		{
			Schema::drop('company_info');
		});
    }
    
}
