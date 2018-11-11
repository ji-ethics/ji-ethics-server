<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_section', function (Blueprint $table) {
            $table->integer('chapter_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->timestamps();
            $table->primary(['chapter_id', 'section_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter_section');
    }
}
