<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserpurchasesTable extends Migration {

    /**
	 * NB.this differs from purchases table in that email field is always 
	 * filled with user with account
	 * 
	 * 
	 * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userpurchases', function($table)
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
        Schema::dropIfExists('userpurchases');
    }

}
