<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name',64);
            $table->string('password',100);
            $table->string('email',255)->unique()->nullable()->default(NULL);
            $table->string('author_name',100);
            $table->boolean('superuser',FALSE);
            $table->string('remember_token',100);
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
        Schema::drop('users');
    }


}
