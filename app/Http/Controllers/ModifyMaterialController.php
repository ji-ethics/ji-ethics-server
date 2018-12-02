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
    public function sectiondetailedit()
    {
        $chapter_id = $_POST["chapter_id"];
        $section_id = $_POST["section_id"];
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        $detail = str_replace("\r\n","<br/>",$detail);

        DB::transaction(function () use ($chapter_id, $section_id, $title, $detail) {
            DB::table('sections')
                ->join('chapter_section','sections.id','=','chapter_section.section_id')
                ->where('chapter_section.chapter_id', '=', $chapter_id)
                ->where('sections.rank', '=', $section_id)
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
        $detail = str_replace("\r\n","<br/>",$detail);
        $reference = str_replace("\r\n","<br/>",$reference);

        DB::transaction(function () use ($id, $title, $detail, $reference) {
            DB::table('case_study_material')
                ->where('case_study_material.id', '=', $id)
                ->update([
                    'case_study_material.title' => $title,
                    'case_study_material.details' => $detail,
                    'case_study_material.reference' => $reference
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
    public function sectiondetailadd()
    {
        $chapter_id = $_POST["chapter_id"];
        $section_id = $_POST["section_id"];
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        $detail = str_replace("\r\n","<br/>",$detail);

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
            $section_id = $_POST["section_id"];
            $question_id = $_POST["question_id"];
            $question_detail = $_POST["question_detail"];

            $section = DB::table('sections')
                ->join('chapter_section','sections.id','=','chapter_section.section_id')
                ->select('sections.id as section_id','chapter_section.chapter_id as chapter_id','sections.rank as section_rank')
                ->get();
            $section = json_decode($section,true);
            foreach($section as $section_com)
            {
                if($section_com['section_rank'] == $section_id and $section_com['chapter_id'] == $chapter_id)
                {
                    $counter = $section_com['section_id'];
                }
            }


            DB::transaction(function () use ($counter,$question_id,$question_detail) {
                DB::table('section_question')
                    ->insert([
                        'section_question.section_id' => $counter,
                        'section_question.question_id' => $question_id,
                        'section_question.question' => $question_detail
                    ]);
            });

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
