<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class ChapterController extends Controller
{
    public function chapter($id,$section_rank)
    {
        $sections = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->join('chapters','chapters.id','=','chapter_section.chapter_id')
            ->select('chapters.id as chapter_id','sections.title','sections.detail','sections.rank','sections.id')
            ->where('chapters.id','=',$id)
            ->where('sections.rank','=',$section_rank)
            ->orderBy('sections.rank')->get();

        $chapters = DB::table('chapters')
            ->select('chapters.id','chapters.title')
            ->orderBy('chapters.id')->get();

        $sections_title = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('sections.rank','sections.title','sections.id')
            ->where('chapter_section.chapter_id','=',$id)
            ->orderBy('sections.rank')->get();

        $chapter_section = DB::table('chapter_section')
            ->join('sections','chapter_section.section_id','=','sections.id')
            ->select('sections.rank as section_rank','chapter_section.chapter_id','chapter_section.section_id')
            ->orderBy('sections.id')->get();

        $section_question = DB::table('section_question')
            ->join('sections','section_question.section_id','=','sections.id')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('section_question.question_id','section_question.question')
            ->where('chapter_section.chapter_id','=',$id)
            ->where('sections.rank','=',$section_rank)
            ->orderBy('section_question.question_id')->get();


        return view('chapter', compact('sections','chapters','sections_title','chapter_section','section_question'));
    }
}
