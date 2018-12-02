<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class ShowStudyMaterial extends Controller
{
    public function show()//
    {
        $chapter = DB::table('chapters')
            ->select('chapters.id','chapters.title')
            ->orderBy('chapters.id')->get();


        $sections = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('chapter_section.chapter_id as chapter_id','sections.title','sections.rank')
            ->orderBy('chapter_id')
            ->orderBy('sections.rank')->get();

        $section_question = DB::table('section_question')
            ->join('sections','section_question.section_id','=','sections.id')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('section_question.question_id','section_question.question','sections.rank as section_rank','chapter_section.chapter_id as chapter_id')
            ->orderBy('chapter_id')
            ->orderBy('section_rank')
            ->orderBy('section_question.question_id')->get();

        return view('show_data_studymaterials', compact('chapter','sections','section_question'));
    }


}
