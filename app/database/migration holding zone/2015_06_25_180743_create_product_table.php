<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->float('price');
            $table->string('title');
            $table->string('subtitle');
            $table->string('description_1',512);
            $table->string('description_2',512);
            $table->string('description_3');
            $table->string('description_4');
            $table->string('product_type');
            $table->string('product_sub_type');
			$table->integer('page_order');
            $table->integer('full_size_image_id');
            $table->integer('small_size_image_id');
            $table->integer('thumbnail_image_id');
            $table->timestamps();
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
		Schema::dropIfExists('product');
	}

}
