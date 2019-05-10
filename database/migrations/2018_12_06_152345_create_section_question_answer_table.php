<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionQuestionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_question_answer', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('answer');
            $table->integer('score');
            $table->primary(['id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('section_question_answer');
    }
}
