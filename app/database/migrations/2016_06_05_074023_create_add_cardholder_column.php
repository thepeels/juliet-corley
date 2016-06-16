<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddCardholderColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('purchases',function($table){
			$table->string('cardholder_name',255)->after('email')->nullable()->default(NULL);
			$table->string('zip_code',255)->after('cardholder_name')->nullable()->default(NULL);
		});
		Schema::table('userpurchases',function($table){
			$table->string('cardholder_name',255)->after('email')->nullable()->default(NULL);
			$table->string('zip_code',255)->after('cardholder_name')->nullable()->default(NULL);
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
		Schema::table('purchases',function($table){
			$table->dropColumn('cardholder_name');
			$table->dropColumn('zip_code');
		});
		Schema::table('userpurchases',function($table){
			$table->dropColumn('cardholder_name');
			$table->dropColumn('zip_code');
		});
	}

}
