<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSectionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_section_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chapter_id')->unsigned();
            $table->integer('section_rank')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('user_id');
            $table->text('answer')->nullable();
            $table->integer('score')->nullable();
            $table->integer('full_score')->nullable();
            $table->primary(['user_id', 'chapter_id', 'question_id', 'section_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_section_answer');
    }
}
