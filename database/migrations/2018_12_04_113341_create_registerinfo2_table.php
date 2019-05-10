<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterinfo2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registerinfo2', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('language1');
            $table->text('language1_order');
            $table->text('language1_speaking');
            $table->text('language1_listening');
            $table->text('language1_reading');
            $table->text('language1_writing');
            $table->text('language2')->nullable();
            $table->text('language2_order')->nullable();
            $table->text('language2_speaking')->nullable();
            $table->text('language2_listening')->nullable();
            $table->text('language2_reading')->nullable();
            $table->text('language2_writing')->nullable();
            $table->text('language3')->nullable();
            $table->text('language3_order')->nullable();
            $table->text('language3_speaking')->nullable();
            $table->text('language3_listening')->nullable();
            $table->text('language3_reading')->nullable();
            $table->text('language3_writing')->nullable();
            $table->text('language4')->nullable();
            $table->text('language4_order')->nullable();
            $table->text('language4_speaking')->nullable();
            $table->text('language4_listening')->nullable();
            $table->text('language4_reading')->nullable();
            $table->text('language4_writing')->nullable();
            $table->integer('if_valid')->nullable();
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
        Schema::dropIfExists('registerinfo2');
    }
}
