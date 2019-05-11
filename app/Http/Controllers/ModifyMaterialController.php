<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Database\Eloquent\Model;

class ModifyMaterialController extends Controller
{
    public function showsection($id,$section_id)//
    {
        $sections = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('chapter_section.chapter_id as chapter_id','sections.title','sections.rank','sections.detail')
            ->where('chapter_id','=',$id)
            ->where('rank','=',$section_id)
            ->get();

        return view('section_detail_modify', compact('sections','id','section_id'));
    }////
    public function showsectionquestion($id,$section_id,$question_rank)//
    {
        $section_question = DB::table('section_question')
            ->join('sections','section_question.section_id','=','sections.id')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('section_question.id as question_id','section_question.detail as question')
            ->where('chapter_section.chapter_id','=',$id)
            ->where('sections.rank','=',$section_id)
            ->where('section_question.question_rank','=',$question_rank)
            ->orderBy('section_question.question_rank')->get();

        return view('section_question_modify', compact('section_question','id','section_id','question_rank'));
    }

    public function showchapter($id)//
    {
        $chapters = DB::table('chapters')
            ->select('chapters.id','chapters.title')
            ->where('chapters.id','=',$id)
            ->get();

        return view('Chapter_title_modify', compact('chapters','id'));
    }

    public function showcase($id)//
    {
        $case = DB::table('case_study_material')
            ->select('id','title','details','reference')
            ->where('id','=',$id)
            ->get();

        return view('case_content_modify', compact('case','id'));
    }

    public function addsection($id)//
    {
        $section = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('sections.id')
            ->orderBy('sections.id')->get();

        $section = json_decode($section,'true');
        $new_section = end($section);
        $section_counter = $new_section['id']+1;

        return view('add_newsection', compact('id','section_counter'));
    }
    public function addnewcase($id)//
    {
        return view('add_newcase',compact('id'));
    }
    public function addsectionquestion($id)//
    {
        return view('add_newsectionquestions', compact('id'));
    }
    public function addnewsurvey()//
    {
        return view('add_newsurvey');
    }
    public function addsurveyquestion($id)//
    {
        return view('add_newsurveyquestions', compact('id'));
    }
    public function sectiondetailedit()
    {
        $chapter_id = $_POST["chapter_id"];
        $section_rank = $_POST["section_id"];
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        $detail = str_replace("\n","<br/>",$detail);

        DB::transaction(function () use ($chapter_id, $section_rank, $title, $detail) {
            DB::table('sections')
                ->join('chapter_section','sections.id','=','chapter_section.section_id')
                ->where('chapter_section.chapter_id', '=', $chapter_id)
                ->where('sections.rank', '=', $section_rank)
                ->update([
                    'sections.title' => $title,
                    'sections.detail' => $detail
                ]);
        });
    }

    public function casedetailedit()
    {
        $id = $_POST["id"];
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        $reference = $_POST["reference"];
        $detail = str_replace("\n","<br/>",$detail);
        $reference = str_replace("\n","<br/>",$reference);

        DB::transaction(function () use ($id, $title, $detail, $reference) {
            DB::table('case_study_material')
                ->where('case_study_material.id', '=', $id)
                ->update([
                    'case_study_material.title' => $title,
                    'case_study_material.details' => $detail,
                    'case_study_material.reference' => $reference
                ]);
        });
        for($question_id = 1; $question_id<=16; $question_id++)
        DB::transaction(function () use ($id,$question_id) {
            DB::table('case_to_question')
                ->insert([
                    'case_to_question.case_id' => $id,
                    'case_to_question.question_id' => $question_id
                ]);
        });


    }
    public function chaptertitleedit()
    {
        $id = $_POST["id"];
        $title = $_POST["title"];

        DB::transaction(function () use ($id, $title) {
            DB::table('chapters')
                ->where('chapters.id', '=', $id)
                ->update([
                    'chapters.title' => $title,
                ]);
        });
    }
    public function sectionquestionedit()
    {
        $id = $_POST["question_id"];
        $title = $_POST["title"];

        DB::transaction(function () use ($id, $title) {
            DB::table('section_question')
                ->where('section_question.id', '=', $id)
                ->update([
                    'section_question.detail' => $title,
                ]);
        });
    }
    public function surveydetailedit()
    {
        $id = $_POST["survey_id"];
        $title = $_POST["title"];
        $choice0 = $_POST["choice0"];
        $choice1 = $_POST["choice1"];
        $choice2 = $_POST["choice2"];
        $choice3 = $_POST["choice3"];
        $choice4 = $_POST["choice4"];
        $choice5 = $_POST["choice5"];

        DB::transaction(function () use ($id, $title,$choice0,$choice1,$choice2,$choice3,$choice4,$choice5) {
            DB::table('survey_question')
                ->where('survey_question.id', '=', $id)
                ->update([
                    'survey_question.title' => $title,
                    'survey_question.choice0' => $choice0,
                    'survey_question.choice1' => $choice1,
                    'survey_question.choice2' => $choice2,
                    'survey_question.choice3' => $choice3,
                    'survey_question.choice4' => $choice4,
                    'survey_question.choice5' => $choice5,
                ]);
        });

    }
    public function sectiondetailadd()
    {
        $chapter_id = $_POST["chapter_id"];
        $section_id = $_POST["section_id"];
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        $detail = str_replace("\n","<br/>",$detail);

        DB::transaction(function () use ($chapter_id, $section_id, $title, $detail) {
            DB::table('sections')
                ->insert([
                    'sections.rank' => $section_id,
                    'sections.title' => $title,
                    'sections.detail' => $detail
                ]);
        });

        $section = DB::table('sections')
            ->select('sections.id')
            ->orderBy('sections.id')->get();
        $section = json_decode($section,true);
        $section_counter = end($section)['id'];

        DB::transaction(function () use ($chapter_id,$section_counter) {
            DB::table('chapter_section')
                ->insert([
                    'chapter_section.chapter_id'=> $chapter_id,
                    'chapter_section.section_id'=> $section_counter
                ]);
        });
    }
    public function sectionquestionadd()
    {

        if($_POST["chapter_id"]!=null and $_POST["question_id"]!=null and $_POST["question_detail"]!=null) {

            $chapter_id = $_POST["chapter_id"];
            $section_rank = $_POST["section_id"];
            $question_id = $_POST["question_id"];
            $question_detail = $_POST["question_detail"];


            $section = DB::table('sections')
                ->join('chapter_section','sections.id','=','chapter_section.section_id')
                ->select('sections.id as section_id')
                ->where('sections.rank','=',$section_rank)
                ->where('chapter_section.chapter_id','=',$chapter_id)
                ->get();
            $section = json_decode($section,true);
            $section_id = $section[0]['section_id'];
            if ( $section_id!=null ) {
                DB::transaction(function () use ($section_id, $question_id, $question_detail) {
                    DB::table('section_question')
                        ->insert([
                            'section_question.section_id' => $section_id,
                            'section_question.question_rank' => $question_id,
                            'section_question.detail' => $question_detail
                        ]);
                });
            }


        }


    }
    public function chapteradd()
    {
        if($_POST["title"]!=null and $_POST["id"]!=null) {
            $id = $_POST["id"];
            $title = $_POST["title"];

            DB::transaction(function () use ($id, $title) {
                DB::table('chapters')
                    ->insert([
                        'chapters.id' => $id,
                        'chapters.title' => $title
                    ]);
            });
        }
        return redirect("showstudymaterial");
    }
    public function surveyadd()
    {

        $survey_question = DB::table('survey_question')
        ->select('survey_question.id')
        ->orderBy('survey_question.id')->get();
        $survey_question = json_decode($survey_question,true);
        foreach($survey_question as $pre_id)
        {
            if ($pre_id['id'] == $_POST["id"])
            {
                return "please input an independent key";
            }
        }

        if($_POST["title"]!=null and $_POST["id"]!=null) {
            $id = $_POST["id"];
            $title = $_POST["title"];
            $choice0 = $_POST["choice0"];
            $choice1 = $_POST["choice1"];
            $choice2 = $_POST["choice2"];
            $choice3 = $_POST["choice3"];
            $choice4 = $_POST["choice4"];
            $choice5 = $_POST["choice5"];

            DB::transaction(function () use ($id, $title,$choice0,$choice1,$choice2,$choice3,$choice4,$choice5) {
                DB::table('survey_question')
                    ->insert([
                        'survey_question.id' => $id,
                        'survey_question.title' => $title,
                        'survey_question.choice0' => $choice0,
                        'survey_question.choice1' => $choice1,
                        'survey_question.choice2' => $choice2,
                        'survey_question.choice3' => $choice3,
                        'survey_question.choice4' => $choice4,
                        'survey_question.choice5' => $choice5,
                    ]);
            });
        }
    }
    public function surveyquestionadd()
    {
        if($_POST["question_detail"]!=null and $_POST["survey_id"]!=null) {
            $id = $_POST["survey_id"];
            $title = $_POST["question_detail"];

            DB::transaction(function () use ($id, $title) {
                DB::table('survey_detail_question')
                    ->insert([
                        'survey_detail_question.survey_id' => $id,
                        'survey_detail_question.detail' => $title
                    ]);
            });
        }
    }
    public function casedetailadd()
    {
        if($_POST["title"]!=null and $_POST["detail"]!=null) {
            $id = $_POST["case_id"];
            $title = $_POST["title"];
            $detail = $_POST["detail"];
            $reference = $_POST["reference"];

            DB::transaction(function () use ($id, $title,$detail,$reference) {
                DB::table('case_study_material')
                    ->insert([
                        'case_study_material.id' => $id,
                        'case_study_material.title' => $title,
                        'case_study_material.details' => $detail,
                        'case_study_material.reference' => $reference
                    ]);
            });
        }
        return redirect("showstudymaterial");
    }
}
