<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish', function($table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('base_price');
            $table->integer('large_image_id');
            $table->integer('large_image_flipped_id');
            $table->integer('small_image_id');
            $table->integer('small_image_flipped_id');
            $table->integer('silhouette_image_id');
            $table->integer('outline_image_id');
            $table->integer('image_thumb_id');
            $table->integer('image_thumb_flipped_id');
            $table->integer('silhouette_thumb_id');
            $table->integer('outline_thumb_id');
            $table->integer('large_image_watermarked_id');
            $table->timestamps();
            $table->string('genus');
            $table->string('species');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('fish');
    }

}
