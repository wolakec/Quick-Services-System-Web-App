<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyQrCodestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('qr_codes', function(Blueprint $table)
		{
			$table->boolean('printed');
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
			$table->dropColumn('printed');
		});
    }
}
