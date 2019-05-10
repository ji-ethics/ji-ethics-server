<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Support\Facades\Auth;


class SurveyController extends Controller
{
    public function survey($id)
    {
        $user_id = Auth::user()->id;

        $survey_questions = DB::table('survey_question')
            ->select('survey_question.id','survey_question.title','survey_question.choice0','survey_question.choice1','survey_question.choice2','survey_question.choice3','survey_question.choice4','survey_question.choice5')
            ->where('survey_question.id','=',$id)
            ->get();

        $survey_details = DB::table('survey_detail_question')
            ->select('survey_detail_question.id','survey_detail_question.detail')
            ->where('survey_detail_question.survey_id','=',$id)
            ->get();

        $survey_answer = DB::table('survey_detail_question')
            ->join('survey_answer','survey_detail_question.id','=','survey_answer.id')
            ->select('survey_answer.answer')
            ->where('survey_detail_question.survey_id','=',$id)
            ->where('survey_answer.user_id','=',$user_id)
            ->get();

        $survey_answer = json_decode($survey_answer,true);
        if($survey_answer == null)
        {
            return view('surveys', compact('survey_questions','survey_details','id'));
        }
        else{
            return redirect('survey_finished');
        }


    }//
    public function choosesurvey()
    {
        $survey_question = DB::table('survey_question')
            ->select('survey_question.id','survey_question.title')
            ->orderBy('survey_question.id')->get();

        return view('Chooseonesurvey', compact('survey_question'));

    }
    public function surveyanswer_edit()
    {
        $user_id = Auth::user()->id;
        for($i = 0; $i < count($_POST["id"]); $i++)
        {

            $id = $_POST["id"][$i];
            $question_answer = $_POST["answer"][$i];

            $survey_answer = DB::table('survey_answer')
                ->select('survey_answer.id')
                ->where('survey_answer.user_id','=',$user_id)
                ->where('survey_answer.id','=',$id)
                ->get();

            $survey_answer = json_decode($survey_answer);

            if(count($survey_answer) == 0) {
                DB::transaction(function () use ($user_id,$id, $question_answer) {
                    DB::table('survey_answer')
                        ->insert([
                            'survey_answer.user_id' => $user_id,
                            'survey_answer.id' => $id,
                            'survey_answer.answer' => $question_answer
                        ]);
                });
            }
            elseif(count($survey_answer) != 0){
                DB::transaction(function () use ($user_id,$id, $question_answer) {
                    DB::table('survey_answer')
                        ->where('survey_answer.user_id', '=', $user_id)
                        ->where('survey_answer.id', '=', $id)
                        ->update([
                            'survey_answer.answer' => $question_answer
                        ]);
                });
            }
        }
        return redirect('survey_finished');


    }
}
