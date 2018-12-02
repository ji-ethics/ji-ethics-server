<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function showaddsection($id)//
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
    public function sectiondetailadd()
    {
        $chapter_id = $_POST["chapter_id"];
        $section_id = $_POST["section_id"];
        $section_counter = $_POST["section_counter"];
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


            DB::transaction(function () use ($chapter_id,$section_counter) {
                DB::table('chapter_section')
                    ->insert([
                        'chapter_section.chapter_id'=> $chapter_id,
                        'chapter_section.section_id'=> $section_counter
                ]);
            });
        }

}
