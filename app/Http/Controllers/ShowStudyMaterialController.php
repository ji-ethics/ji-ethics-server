<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class ShowStudyMaterialController extends Controller
{
    public function show()//
    {
        $chapter = DB::table('chapters')
            ->select('chapters.id','chapters.title')
            ->orderBy('chapters.id')->get();

        $case_study = DB::table('case_study_material')
            ->select('id','title','details','reference')
            ->orderBy('id')->get();



        return view('show_data_studymaterials', compact('chapter','case_study'));
    }

    public function destroychapter($id)//
    {
        DB::table('chapters')->where('chapters.id', '=', $id)->delete();
        return redirect("showstudymaterial");
    }
    public function destroycase($id)//
    {
        DB::table('case_study_material')->where('case_study_material.id', '=', $id)->delete();
        return redirect("showstudymaterial");
    }
    public function destroysecquestion($ch_id,$sec_id,$qu_id)
    {
        $section = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('sections.id as section_id','chapter_section.chapter_id as chapter_id','sections.rank as section_rank')
            ->get();
        $section = json_decode($section,true);
        foreach($section as $section_com)
        {
            if($section_com['section_rank'] == $sec_id and $section_com['chapter_id'] == $ch_id)
            {
                $counter = $section_com['section_id'];
            }
        }
        DB::table('section_question')
            ->where('section_question.section_id', '=', $counter)
            ->where('section_question.question_id', '=', $qu_id)
            ->delete();
        return redirect("/check/chapter/$ch_id");
    }
}
