<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddNullableProperty extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE `users` MODIFY `oauth_email` VARCHAR(255) NULL;');
		DB::statement('UPDATE `users` SET `oauth_email` = NULL WHERE `oauth_email` = "";');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('UPDATE `users` SET `oauth_email` = "" WHERE `oauth_email` = NULL;');
		DB::statement('ALTER TABLE `users` MODIFY `oauth_email` VARCHAR(255) NOT NULL;');
	}

}
