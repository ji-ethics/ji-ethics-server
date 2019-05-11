<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Database\Eloquent\Model;


class ListChapterController extends Controller
{
    public function listchapter()
    {

        $select = $_POST['title'];
        $sectionid = $_POST['sectionid'];

        $sections = DB::table('sections')
            ->join('chapter_section', 'sections.id', '=', 'chapter_section.section_id')
            ->join('chapters', 'chapters.id', '=', 'chapter_section.chapter_id')
            ->select('chapters.id as chapter_id', 'sections.title', 'sections.detail', 'sections.rank', 'sections.id')
            ->where('chapters.id', '=', $select)
            ->where('sections.rank', '=', $sectionid)
            ->orderBy('sections.rank')->get();


        return view('administer_material_submit', compact('sections'));
    }
    //add new section
    public function materialadd()
    {

        $chapter_id = $_POST["chapter_id"];// only one element
        $section_rank = $_POST["section"];//others are array
        $section_title = $_POST["sectiontitle"];
        $section_detail = $_POST["sectiondetail"];

        $sections = DB::table('sections')
            ->join('chapter_section', 'sections.id', '=', 'chapter_section.section_id')
            ->join('chapters', 'chapters.id', '=', 'chapter_section.chapter_id')
            ->select('sections.id')
            ->where('chapters.id', '=', $chapter_id)
            ->where('sections.rank', '=', $section_rank)
            ->get();
        $chapters = DB::table('chapters')
            ->select('chapters.id')
            ->where('chapters.id','=',$chapter_id)
            ->get();
        //!empty($sections['id'])
        if (count($sections) != 0) {
            $reture_url=url("/admin/material/add");
            $errordata="The section already exist";
            return view('Error_Page',$reture_url,$errordata);
        } else {
            if(count($chapters) != 0){
//                DB::transaction(function () use ($chapter_id, $section_rank, $section_title, $section_detail) {
//                    $section_id = DB::table('sections')
//                        ->insertGetId([
//                            'rank' => $section_rank,
//                            'title' => $section_title,
//                            'detail' => $section_detail
//                        ]);
//                    DB::table('chapter_section')
//                        ->insert([
//                            'chapter_id' => $chapter_id,
//                            'section_id' => $section_id
//                        ]);
//                });
            } else {
                $reture_url=url("/admin/material/add");
                $errordata="The chapter does not exist";
                return view('Error_Page',$reture_url,$errordata);
            }

        }


        return view('administer_material_section');
    }

//edit section
    public function materialedit()
    {

        $chapter_id = $_POST["chapter_id"];// only one element
        $section_rank = $_POST["section"];//others are array
        $section_title = $_POST["sectiontitle"];
        $section_detail = $_POST["sectiondetail"];

        $sections = DB::table('sections')
            ->join('chapter_section', 'sections.id', '=', 'chapter_section.section_id')
            ->join('chapters', 'chapters.id', '=', 'chapter_section.chapter_id')
            ->select('sections.id')
            ->where('chapters.id', '=', $chapter_id)
            ->where('sections.rank', '=', $section_rank)
            ->get();
        //!empty($sections['id'])
        if (count($sections) != 0) {
            $section_id = $sections->first();
            DB::transaction(function () use ($section_id, $chapter_id, $section_rank, $section_title, $section_detail) {
//                DB::table('chapters')
//                    ->where('id',$chapter_id)
//                    ->update([
//                    //'title' => ...;
//                ]);
                DB::table('sections')
                    ->where('id', $section_id)
                    ->update([
                        'rank' => $section_rank,
                        'title' => $section_title,
                        'detail' => $section_detail
                    ]);
            });
        } //else {
//            ;//
//        }


        return view('administer_material_section');

    }
}
class Post extends Model
{
    protected $guarded = [];
//
}
