<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOuthemailColumnToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//add oauth_email column and both_emails
		Schema::table('users',function($table){
			$table->string('oauth_email',255)->after('email');
			$table->boolean('both_emails',FALSE)->after('oauth_email');
			$table->dropColumn('author_name');
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
		Schema::table('users',function($table){
			$table->dropColumn('oauth_email');
			$table->dropColumn('both_emails');
			//$table->string('author_name',255)->after('email');
		});
	}

}
