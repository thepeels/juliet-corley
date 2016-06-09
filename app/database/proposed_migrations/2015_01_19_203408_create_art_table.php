<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arts', function($table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('price');
            $table->integer('full_size_image_id');
            $table->integer('small_size_image_id');
            $table->integer('thumbnail_id');
            $table->string('description');
            $table->string('category');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('arts');
	}

}
