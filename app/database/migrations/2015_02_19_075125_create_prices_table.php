<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name',64);
            $table->integer('first_price');
            $table->integer('second_price');
            $table->integer('third_price');
            $table->integer('fourth_price');
            $table->integer('special_price');
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
        Schema::dropIfExists('prices');
    }

}
