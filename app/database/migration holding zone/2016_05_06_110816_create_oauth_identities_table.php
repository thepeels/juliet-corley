<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOauthIdentitiesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oauth_identities', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('provider_user_id');
			$table->string('provider');
			$table->string('access_token');
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
		Schema::dropIfExists('oauth_identities');
	}
}