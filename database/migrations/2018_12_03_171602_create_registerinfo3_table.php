<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterinfo3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registerinfo3', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('education_level');
            $table->text('majoring_in')->nullable();
            $table->text('currently_pursuing');
            $table->text('major_current');
            $table->text('anticipated_field');
            $table->text('anticipated_field_other')->nullable();
            $table->text('parental_level');
            $table->text('major_parent')->nullable();
            $table->text('income_rmb')->nullable();
            $table->text('income_usd')->nullable();
            $table->integer('if_valid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *php
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registerinfo3');
    }
}
