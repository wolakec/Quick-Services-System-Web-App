<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function(Blueprint $table)
        {
                $table->increments('id');
                $table->integer('user_id')->length(10)->unsigned()->nullable();
                $table->integer('role_id')->length(10)->unsigned()->nullable();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_roles', function(Blueprint $table)
        {
		Schema::drop('user_roles');
        });
    }
}
