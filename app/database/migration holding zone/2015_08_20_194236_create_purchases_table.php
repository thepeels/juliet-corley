<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatepurchasesTable extends Migration {

	/**
	 * NB. This table does not require email to filled unlike the
	 * userpurchases table
	 * 
	 * 
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases', function($table)
        {
            $table->increments('id')->unsigned();        
            $table->string('email', 255);      
            $table->string('purchase', 255);      
            $table->integer('amount');
            $table->integer('image_id');            
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
		Schema::dropIfExists('purchases');
	}

}
