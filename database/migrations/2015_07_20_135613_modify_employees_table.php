<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function(Blueprint $table)
		{
			$table->dropColumn('password');
                        $table->dropColumn('email');
                        $table->integer('user_id')->length(10)->unsigned()->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function(Blueprint $table)
		{
                        $table->string('password', 60)->nullable();
			$table->string('email')->nullable();
                        $table->dropColumn('user_id');      
		});
    }
}
