<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Support\Facades\Auth;


class ChapterController extends Controller
{
    public function chapter($id,$section_rank)
    {
        $user_id = Auth::user()->id;
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

        $user_answer = DB::table('section_question_answer')
            ->join('section_question','section_question_answer.id','=','section_question.id')
            ->join('sections','section_question.section_id','=','sections.id')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('section_question_answer.answer','section_question.question_rank as question_rank','section_question_answer.user_id','chapter_section.chapter_id as chapter_id','sections.rank as section_rank')
            ->where('section_question_answer.user_id','=',$user_id)
            ->orderBy('section_question.question_rank')->get();

        $sections_title = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('sections.rank','sections.title','sections.id')
            ->where('chapter_section.chapter_id','=',$id)
            ->orderBy('sections.rank')->get();

        $case_study = DB::table('case_study_material')
            ->select('case_study_material.id','case_study_material.title','case_study_material.details','case_study_material.reference')
            ->orderBy('case_study_material.id')->get();

        $chapter_section = DB::table('chapter_section')
            ->join('sections','chapter_section.section_id','=','sections.id')
            ->select('sections.rank as section_rank','chapter_section.chapter_id','chapter_section.section_id')
            ->orderBy('sections.id')->get();

        $section_question = DB::table('section_question')
            ->join('sections','section_question.section_id','=','sections.id')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('section_question.question_rank','section_question.detail')
            ->where('chapter_section.chapter_id','=',$id)
            ->where('sections.rank','=',$section_rank)
            ->orderBy('section_question.question_rank')->get();


        return view('chapter', compact('user_answer','sections','chapters','sections_title','case_study','chapter_section','section_question','id','section_rank'));
    }
    public function answeredit()
    {
        $user_id = Auth::user()->id;

        foreach($_POST["question_id"] as $pointer)
        {
            $chapter_id = $_POST["chapter_id"][$pointer-1];
            $sec_rank = $_POST["section_rank"][$pointer-1];
            $question_id = $_POST["question_id"][$pointer-1];
            $question_answer = $_POST["answer"][$pointer-1];

            $section_question_id = DB::table('section_question')
                ->join('sections','section_question.section_id','=','sections.id')
                ->join('chapter_section','chapter_section.section_id','=','sections.id')
                ->select('section_question.id')
                ->where('chapter_section.chapter_id','=',$chapter_id)
                ->where('sections.rank','=',$sec_rank)
                ->where('section_question.question_rank','=',$question_id)
                ->get();
            $section_question_id = json_decode($section_question_id,true);
            $id = $section_question_id[0]['id'];
            $user_answer = DB::table('section_question_answer')
                ->select('section_question_answer.id')
                ->where('section_question_answer.user_id','=',$user_id)
                ->where('section_question_answer.id','=',$id)
                ->get();
            $user_answer = json_decode($user_answer,true);

            if(count($user_answer) == 0) {
                DB::transaction(function () use ($user_id,$id, $question_answer) {
                    DB::table('section_question_answer')
                        ->insert([
                            'section_question_answer.user_id' => $user_id,
                            'section_question_answer.id' => $id,
                            'section_question_answer.answer' => $question_answer
                        ]);
                });
            }
            elseif(count($user_answer) != 0){
                DB::transaction(function () use ($user_id,$id, $question_answer) {
                    DB::table('section_question_answer')
                        ->where('section_question_answer.user_id', '=', $user_id)
                        ->where('section_question_answer.id', '=', $id)
                        ->update([
                            'section_question_answer.answer' => $question_answer
                        ]);
                });
            }
        }




    }
}
