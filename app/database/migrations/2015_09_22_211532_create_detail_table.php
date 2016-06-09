<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::create('details', function($table)
        {
            $table->increments('id');
			$table->integer('user_id');
			$table->string('author_name',512);
			$table->string('alias',512);
			$table->string('note',512);
			$table->string('address',1024);
			$table->string('postcode',64);
			$table->timeStamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('details');
	}

}
