<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('user_name',255);
            $table->char('email',255);
            $table->char('password',255);
            $table->char('first_name',255);
            $table->char('last_name',255);
            $table->dateTime('last_login');
            $table->integer('create_user')->unsigned()->nullable();
            $table->integer('update_user')->unsigned()->nullable();
            $table->integer('is_active');
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
        Schema::dropIfExists('users');
    }
}
