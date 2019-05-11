<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_result', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id');
            $table->integer('question_id');
            $table->text('lda')->nullable();
            $table->text('sentiment')->nullable();
            $table->text('co_occur')->nullable();
            $table->text('regression')->nullable();
            $table->text('cluster')->nullable();
            $table->text('p_or_n')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_result');
    }
}
