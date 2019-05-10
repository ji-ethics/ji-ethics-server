<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class ShowResultController extends Controller
{
    public function index(){
    	$users = DB::table('users')->get();
    	$semesters = DB::table('users')
    				->groupBy("semesters")
    				->pluck("semesters");
    	$section_numbers = DB::table('users')
    						->groupBy("section_numbers")
    						->pluck("section_numbers");
    	return view('admin.result.index', compact("users", "semesters", "section_numbers"));
    }

    // public function user(){
    // 	$userList = DB::table('users')
    // 	->select('id', 'first_name', 'last_name')
    // 	->get();
    // 	return view('result.userlist', compact('userList'));
    // 	#return view('result.userlist');
    // }

    // public function showID($id){
    // 	$userInfo = DB::table('users')->find($id);
    // 	$first_name = $userInfo->first_name;
    // 	$last_name = $userInfo->last_name;


    // 	return view('result.answerPerID', compact('id', 'first_name', 'last_name'));
    // }

    public function show_by_user(){
    	$section = request('section');
    	$semester = request('semester');
    	$match = ['section_numbers' => $section, 'semesters' => $semester];
    	$users = DB::table('users')->where($match)->get();
    	return view('admin.result.show_by_user', compact("users", "semester", "section"));
    	#return view('admin.result.show_by_user', compact("semester", "section"));
    }

    public function show_by_ID($user_id){
    	$user = DB::table('users')->find($user_id);
    	$section_answer_for_user = DB::table('section_question_answer')
    								->where('user_id' , $user->id)
    								->get();

    	$case_answer_for_user = DB::table('case_study_answer')
    								->where('user_id' , $user->id)
    								->get();


    	$section_empty = $section_answer_for_user->isEmpty();
    	$case_empty = $case_answer_for_user->isEmpty();


		if (!$section_empty and !$case_empty) {
			
			
			$section_question_answers = DB::table('section_question')
    								->join('section_question_answer', 
    									'section_question.id', '=','section_question_answer.id')
    								->join('chapter_section', 
    								 	'section_question.section_id', '=', 'chapter_section.section_id')
    							 	->orderBy('chapter_id', 'ASC')
    								->orderBy('question_rank', 'ASC')
    								->where('user_id', $user->id)
    								->get();
    		// dd($section_question_answers);
    		return view('admin.result.show_by_id', compact("user", "section_question_answers"));
		}
		elseif($section_empty and !$case_empty){
			dd('No chapter answer!');
		}
		elseif(!$section_empty and $case_empty){
			dd('No case study answer!');
		}
		else{
			dd('No answer!');
		}
    	
    	


    }
}
