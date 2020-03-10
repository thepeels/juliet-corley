<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageLoadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		 Schema::create('pageloads',function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('cartview');
            $table->integer('addtocart');
            $table->integer('pdf');
            $table->integer('amount_in_cart');
            $table->string('client_ip',100);
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
		//
		Schema::drop('pageloads');
	}

}
