<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class ChoosequestionController extends Controller
{
    public function list()
    {

        $casematerial= DB::table('case_study_material')
           ->select('id','title')
            ->get();

        $casestudy = DB::table('case_to_question')
            ->join('case_study_question','case_study_question.id','=','case_to_question.question_id')
            ->join('case_study_material','case_study_material.id','=','case_to_question.case_id')
            ->select('case_to_question.id','case_to_question.question_id','case_to_question.case_id',
                'case_study_question.question_rank','case_study_question.detail')
            ->get();
        $survey = DB::table('survey_detail_question')
            ->select('id','survey_id','detail')
            ->get();

        $section = DB::table('section_question')
            ->select('id','section_id','question_rank','detail')
            ->get();
        $question_hasresult = DB::table('temp_result')->select('id','type_id','question_id')->get();

        $question_hasresult = json_decode($question_hasresult,true);
        $case_hasresult = array();
        $survey_hasresult = array();
        $section_hasresult = array();
        foreach($question_hasresult as $item){
            if ($item['type_id'] == 1) {
                array_push($case_hasresult, $item['question_id']);
            } elseif ($item['type_id'] == 2){
                array_push($section_hasresult, $item['question_id']);
            } elseif ($item['type_id'] == 3){
                array_push($survey_hasresult, $item['question_id']);
            }
        }
       return view('admin.data_analysis.show_question',
           compact('casematerial','casestudy','survey','section','case_hasresult','section_hasresult','survey_hasresult'));

    }

    public function survey($id)
    {
        $number=DB::table('survey_answer')
            ->where('id','=',$id)
            ->count();
        if($number==0){
            return view('admin.data_analysis.noanswer');
        }
        else{
            $user= DB::table('survey_answer')
                ->join('users','survey_answer.user_id','=','users.id')
                ->where('survey_answer.id','=',$id)
                ->where('users.is_active','=',1)
                ->get();
            $type=1;
            return view('admin.data_analysis.question_choose_user',compact('user','type','id'));
        }
    }

    public function casestudy($id)
    {
        $number=DB::table('case_study_answer')
            ->where('id','=',$id)
            ->count();
        if($number>0) {
            $user = DB::table('case_study_answer')
                ->join('users', 'case_study_answer.user_id', '=', 'users.id')
                ->where('case_study_answer.id', '=', $id)
                ->where('users.is_active','=',1)
                ->get();
            $type = 2;
            return view('admin.data_analysis.question_choose_user', compact('user', 'type','id'));
        }
        else{
            return view('admin.data_analysis.noanswer');
        }

    }

    public function section($id)
    {
        $number=DB::table('survey_answer')
            ->where('id','=',$id)
            ->count();
        if($number==0){
            return view('admin.data_analysis.noanswer');
        }
        else{
            $user= DB::table('section_question_answer')
                ->join('users','section_question_answer.user_id','=','users.id')
                ->where('section_question_answer.id','=',$id)
                ->where('users.is_active','=',1)
                ->get();
            $type=3;
            return view('admin.data_analysis.question_choose_user',compact('user','type','id'));
        }
    }

    public function submit()
    {
//       $users = $_POST["userid"];


        $type = $_POST["type"]; //type 1=survey 2=case study 3=section question
        $question_id = $_POST["questionid"];
        $function = $_POST["Function"];
        $property=$_POST["Focus"]; //Focus = Age/Income
        if ($type==1){
            $table="survey_answer";
            $user= DB::table('survey_answer')
                ->where('survey_answer.id','=',$question_id)
                ->get();
        }
        elseif($type==2){
            $table="case_study_answer";
            $user = DB::table('case_study_answer')
                ->where('case_study_answer.id', '=', $question_id)
                ->get();
        }
        elseif($type==3){
            $table="section_question_answer";
            $user= DB::table('section_question_answer')
                ->where('section_question_answer.id','=',$question_id)
                ->get();
        }
        $message = $function.";".$table.";".$question_id.";";

        $user=json_decode($user,true);

        foreach ($user as $temp){
            $userid=$temp["user_id"];

            $message=$message.$userid.",";
        }
        if(count($user)!=0){
            $message = substr($message,0,strlen($message)-1);
        }
        $message = $message.";".$property;
//        foreach ($users as $temp){
//            $message= $message.";".$temp;
//        }
        $message = mb_convert_encoding($message,'GBK','UTF-8');




        $socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);

        if(socket_connect($socket,'192.168.122.97',6666) == false){
            $return_message= 'connect fail massege:'.socket_strerror(socket_last_error());
        }else{


            if(socket_write($socket,$message,strlen($message)) == false){
                $return_message='fail to write'.socket_strerror(socket_last_error());

            }else{
                while($callback = socket_read($socket,1024)){
                    $return_message= 'server return message is:'.PHP_EOL.$callback;
                }
            }
        }
        socket_close($socket);



        return redirect('/dataanalysis');

    }

    public function result($type,$id)
    {
        $result = DB::table('temp_result')->where('question_id','=',$id)
            ->where('type_id','=',$type)->orderBy('id','desc')->get();
        return view('admin.data_analysis.analysis_result',compact('result'));
    }
}
