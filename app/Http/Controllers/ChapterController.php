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

        $user_answer = DB::table('user_section_answer')
            ->select('user_section_answer.answer','user_section_answer.question_id','user_section_answer.user_id')
            ->where('user_section_answer.section_rank','=',$section_rank)
            ->where('user_section_answer.chapter_id','=',$id)
            ->orderBy('user_section_answer.question_id')->get();

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
            ->select('section_question.question_id','section_question.question')
            ->where('chapter_section.chapter_id','=',$id)
            ->where('sections.rank','=',$section_rank)
            ->orderBy('section_question.question_id')->get();


        return view('chapter', compact('user_answer','sections','chapters','sections_title','case_study','chapter_section','section_question','id','section_rank'));
    }
    public function answeredit()
    {
        foreach($_POST["question_id"] as $pointer)
        {
            $user_id = $_POST["user_id"][$pointer-1];
            $chapter_id = $_POST["chapter_id"][$pointer-1];
            $sec_rank = $_POST["section_rank"][$pointer-1];
            $question_id = $_POST["question_id"][$pointer-1];
            $question_answer = $_POST["answer"][$pointer-1];

            $answer = DB::table('user_section_answer')
                ->select('user_section_answer.user_id')
                ->where('user_section_answer.user_id','=',$user_id)
                ->where('user_section_answer.chapter_id','=',$chapter_id)
                ->where('user_section_answer.section_rank','=',$sec_rank)
                ->where('user_section_answer.question_id','=',$question_id)
                ->get();

            if(count($answer) == 0) {
                DB::transaction(function () use ($user_id, $chapter_id, $sec_rank, $question_id, $question_answer) {
                    DB::table('user_section_answer')
                        ->insert([
                            'user_section_answer.user_id' => $user_id,
                            'user_section_answer.chapter_id' => $chapter_id,
                            'user_section_answer.section_rank' => $sec_rank,
                            'user_section_answer.question_id' => $question_id,
                            'user_section_answer.answer' => $question_answer
                        ]);
                });
            }
            elseif(count($answer) != 0){
                DB::transaction(function () use ($user_id, $chapter_id, $sec_rank, $question_id, $question_answer) {
                    DB::table('user_section_answer')
                        ->where('user_section_answer.user_id', '=', $user_id)
                        ->where('user_section_answer.chapter_id', '=', $chapter_id)
                        ->where('user_section_answer.section_rank', '=', $sec_rank)
                        ->where('user_section_answer.question_id', '=', $question_id)
                        ->update([
                            'user_section_answer.answer' => $question_answer
                        ]);
                });
            }
        }



    }
}
