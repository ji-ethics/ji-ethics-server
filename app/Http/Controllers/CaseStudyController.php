<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class CaseStudyController extends Controller
{
    public function chapter($id,$step_id)
    {
        $user_id = Auth::id();
        $chapters = DB::table('chapters')
            ->select('chapters.id','chapters.title')
            ->orderBy('chapters.id')->get();

        $case_study = DB::table('case_study_material')
            ->select('case_study_material.id','case_study_material.title','case_study_material.details','case_study_material.reference')
            ->orderBy('case_study_material.id')->get();

        $case_question = DB::table('case_study_question')
            ->select('case_study_question.question_rank as question_id','case_study_question.detail as question_detail','case_study_question.step_id')
            ->orderBy('case_study_question.step_id')
            ->orderBy('case_study_question.question_rank')->get();

        $principle = DB::table('ethical_principles')
            ->join('detail_principles','ethical_principles.id','=','detail_principles.title_id')
            ->select('ethical_principles.id', 'ethical_principles.title','detail_principles.detail_id','detail_principles.details')
            ->orderBy('ethical_principles.id')
            ->orderBy('detail_principles.detail_id')->get();

        $answer = DB::table('case_study_answer')
            ->join('case_to_question','case_study_answer.id','=','case_to_question.id')
            ->join('case_study_question','case_study_question.id','=','case_to_question.question_id')
            ->select('case_study_answer.answer as question_answer','case_study_question.step_id','case_study_question.question_rank as question_id')
            ->where('case_to_question.case_id','=',$id)
            ->where('case_study_answer.user_id','=',$user_id)
            ->orderBy('case_study_question.step_id')
            ->orderBy('case_study_question.question_rank')->get();

        return view('CaseStudy', compact('case_study','chapters','case_question','principle','id','step_id','answer','user_id'));
    }//
    public function useransweredit()
    {
        $user_id = Auth::id();
        foreach($_POST["question_id"] as $pointer)
        {
            $case_id = $_POST["case_id"][$pointer-1];
            $case_step_id = $_POST["step_id"][$pointer-1];
            $question_id = $_POST["question_id"][$pointer-1];
            $question_answer = $_POST["question_answer"][$pointer-1];

            $case_question_id = DB::table('case_study_question')
                ->join('case_to_question','case_study_question.id','=','case_to_question.question_id')
                ->select('case_to_question.id')
                ->where('case_to_question.case_id','=',$case_id)
                ->where('case_study_question.step_id','=',$case_step_id)
                ->where('case_study_question.question_rank','=',$question_id)
                ->get();
            $case_question_id = json_decode($case_question_id,true);
            $id = $case_question_id[0]['id'];

            $answer = DB::table('case_study_answer')
                ->select('case_study_answer.user_id')
                ->where('case_study_answer.id','=',$id)
                ->where('case_study_answer.user_id','=',$user_id)
                ->get();

            if(count($answer) == 0) {
                DB::transaction(function () use ($user_id,$id, $question_answer) {
                    DB::table('case_study_answer')
                        ->insert([
                            'case_study_answer.user_id' => $user_id,
                            'case_study_answer.id' => $id,
                            'case_study_answer.answer' => $question_answer
                        ]);
                });
            }
            elseif(count($answer) != 0){
                DB::transaction(function () use ($user_id,$id, $question_answer) {
                    DB::table('case_study_answer')
                        ->where('case_study_answer.user_id', '=', $user_id)
                        ->where('case_study_answer.id', '=', $id)
                        ->update([
                            'case_study_answer.answer' => $question_answer
                        ]);
                });
            }
        }
        if(!$case_step_id ==10){
            $case_step_id = $case_step_id+1;
            
        }
        return redirect("/casestudy/$case_id/step/$case_step_id");


    }





}
