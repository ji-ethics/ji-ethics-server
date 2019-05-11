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
    public function showsurvey()//
    {
        $survey_question = DB::table('survey_question')
            ->select('survey_question.id','survey_question.title')
            ->orderBy('survey_question.id')->get();

        return view('show_survey_questions', compact('survey_question'));
    }
    public function checksurveytitle($id)//
    {
        $survey_question = DB::table('survey_question')
            ->select('survey_question.title','survey_question.choice0','survey_question.choice1','survey_question.choice2','survey_question.choice3','survey_question.choice4','survey_question.choice5')
            ->where('survey_question.id','=',$id)
            ->orderBy('survey_question.id')->get();

        return view('survey_title_modify', compact('survey_question','id'));
    }
    public function checksurveyquestions($id)//
    {
        $survey_detail_question = DB::table('survey_detail_question')
            ->select('survey_detail_question.id','survey_detail_question.detail')
            ->where('survey_detail_question.survey_id','=',$id)
            ->orderBy('survey_detail_question.id')->get();

        return view('show_survey_question_details', compact('survey_detail_question','id'));
    }

    public function destroychapter($id)//
    {
        DB::table('chapters')->where('chapters.id', '=', $id)->delete();

        $section_select = DB::table('chapter_section')
            ->join('sections','chapter_section.section_id','=','sections.id')
            ->select('sections.id')
            ->where('chapter_section.chapter_id', '=', $id)->get();

        $section_select = json_decode($section_select,true);

        foreach($section_select as $sec_select)
        {
            DB::table('sections')
                ->where('sections.id', '=', $sec_select['id'])->delete();
        }

        DB::table('chapter_section')
            ->where('chapter_section.chapter_id', '=', $id)->delete();

        return redirect("showstudymaterial");
    }
    public function destroycase($id)//
    {
        DB::table('case_study_material')->where('case_study_material.id', '=', $id)->delete();
        DB::table('case_to_question')->where('case_to_question.case_id', '=', $id)->delete();

        return redirect("showstudymaterial");
    }
    public function destroysurveyquestions($id,$question_id)//
    {
        DB::table('survey_answer')->where('survey_answer.id', '=', $question_id)->delete();
        DB::table('survey_detail_question')->where('survey_detail_question.id', '=', $question_id)->delete();

        return redirect("check/survey/$id");
    }
    public function destroysurvey($id)//
    {
        $question_select = DB::table('survey_detail_question')
        ->select('survey_detail_question.id')
        ->where('survey_detail_question.survey_id', '=', $id)->get();
        $question_select = json_decode($question_select,true);
        foreach($question_select as $answer_to_delete)
        {
            DB::table('survey_answer')->where('survey_answer.id', '=', $answer_to_delete['id'])->delete();
        }
        DB::table('survey_question')->where('survey_question.id', '=', $id)->delete();
        DB::table('survey_detail_question')->where('survey_detail_question.survey_id', '=', $id)->delete();

        return redirect("showsurvey");
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
        $question_id = DB::table('section_question')
            ->select('section_question.id')
            ->where('section_question.section_id', '=', $counter)
            ->where('section_question.question_rank', '=', $qu_id)
            ->get();
        $question_id = json_decode($question_id,true);
        $question_id = $question_id[0]['id'];

        DB::table('section_question')
            ->where('section_question.section_id', '=', $counter)
            ->where('section_question.question_rank', '=', $qu_id)
            ->delete();

        DB::table('section_question_answer')
            ->where('section_question_answer.id', '=', $question_id)
            ->delete();

        return redirect("/check/chapter/$ch_id");
    }
}
