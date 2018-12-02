<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class ShowSectionContentController extends Controller
{
    public function show($id)//
    {
        $sections = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('chapter_section.chapter_id as chapter_id','sections.title','sections.id as section_id','sections.rank')
            ->where('chapter_id','=',$id)
            ->orderBy('chapter_id')
            ->orderBy('sections.rank')->get();

        $section_question = DB::table('section_question')
            ->join('sections','section_question.section_id','=','sections.id')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('section_question.question_id','section_question.question','sections.rank as section_rank','chapter_section.chapter_id as chapter_id')
            ->where('chapter_id','=',$id)
            ->orderBy('chapter_id')
            ->orderBy('section_rank')
            ->orderBy('section_question.question_id')->get();

        return view('show_data_sectionmaterials', compact('sections','section_question','id'));
    }//
    public function destroy($id,$section_counter)//
    {
        DB::table('sections')->where('id', '=', $section_counter)->delete();
        DB::table('chapter_section')->where('section_id', '=', $section_counter)->delete();

        return redirect("check/chapter/{$id}");
    }
}
