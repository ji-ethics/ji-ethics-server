<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterinfo32Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registerinfo3_2', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('education_level');
            $table->text('major_in')->nullable();
            $table->text('industry');
            $table->text('industry_other')->nullable();
            $table->text('work_position');
            $table->text('work_position_other')->nullable();
            $table->text('income_rmb')->nullable();
            $table->text('income_usd')->nullable();
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
        Schema::dropIfExists('registerinfo3_2');
    }
}
