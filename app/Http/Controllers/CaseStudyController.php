<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Database\Eloquent\Model;

class CaseStudyController extends Controller
{
    public function chapter($id,$step_id)
    {
        $chapters = DB::table('chapters')
            ->select('chapters.id','chapters.title')
            ->orderBy('chapters.id')->get();

        $case_study = DB::table('case_study_material')
            ->select('case_study_material.id','case_study_material.title','case_study_material.details','case_study_material.reference')
            ->orderBy('case_study_material.id')->get();

        $case_question = DB::table('case_study_step')
            ->select('case_study_step.question_id','case_study_step.question_detail','case_study_step.step_id')
            ->orderBy('case_study_step.step_id')
            ->orderBy('case_study_step.question_id')->get();

        $principle = DB::table('ethical_principles')
            ->join('detail_principles','ethical_principles.id','=','detail_principles.title_id')
            ->select('ethical_principles.id', 'ethical_principles.title','detail_principles.detail_id','detail_principles.details')
            ->orderBy('ethical_principles.id')
            ->orderBy('detail_principles.detail_id')->get();

        $answer = DB::table('case_study_answer')
            ->select('case_study_answer.question_answer','case_study_answer.step_id','case_study_answer.user_id','case_study_answer.question_id')
            ->where('case_study_answer.case_id','=',$id)
            ->orderBy('case_study_answer.step_id')
            ->orderBy('case_study_answer.question_id')->get();

        return view('CaseStudy', compact('case_study','chapters','case_question','principle','id','step_id','answer'));
    }//
    public function useransweredit()
    {
        foreach($_POST["question_id"] as $pointer)
        {
            $user_id = $_POST["user_id"][$pointer-1];
            $case_id = $_POST["case_id"][$pointer-1];
            $case_step_id = $_POST["step_id"][$pointer-1];
            $question_id = $_POST["question_id"][$pointer-1];
            $question_answer = $_POST["question_answer"][$pointer-1];

            $answer = DB::table('case_study_answer')
                ->select('case_study_answer.user_id')
                ->where('case_study_answer.user_id','=',$user_id)
                ->where('case_study_answer.case_id','=',$case_id)
                ->where('case_study_answer.step_id','=',$case_step_id)
                ->where('case_study_answer.question_id','=',$question_id)
                ->get();

            if(count($answer) == 0) {
                DB::transaction(function () use ($user_id, $case_id, $case_step_id, $question_id, $question_answer) {
                    DB::table('case_study_answer')
                        ->insert([
                            'case_study_answer.user_id' => $user_id,
                            'case_study_answer.case_id' => $case_id,
                            'case_study_answer.step_id' => $case_step_id,
                            'case_study_answer.question_id' => $question_id,
                            'case_study_answer.question_answer' => $question_answer
                        ]);
                });
            }
            elseif(count($answer) != 0){
                DB::transaction(function () use ($user_id, $case_id, $case_step_id, $question_id, $question_answer) {
                    DB::table('case_study_answer')
                        ->where('case_study_answer.user_id', '=', $user_id)
                        ->where('case_study_answer.case_id', '=', $case_id)
                        ->where('case_study_answer.step_id', '=', $case_step_id)
                        ->where('case_study_answer.question_id', '=', $question_id)
                        ->update([
                            'case_study_answer.question_answer' => $question_answer
                        ]);
                });
            }
        }



    }





}
