<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class SurveyController extends Controller
{
    public function survey($id)
    {
        $survey_questions = DB::table('survey_question')
            ->select('survey_question.id','survey_question.title','survey_question.choice0','survey_question.choice1','survey_question.choice2','survey_question.choice3','survey_question.choice4','survey_question.choice5')
            ->get();

        $survey_details = DB::table('survey_question_detail')
            ->select('survey_question_detail.id','survey_question_detail.detail')
            ->where('survey_question_detail.survey_question_id','=',$id)
            ->get();

        return view('surveys', compact('survey_questions','survey_details','id'));

    }//
}
