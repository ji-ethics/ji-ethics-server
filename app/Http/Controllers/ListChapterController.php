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

        $id=$_POST['title'];

        $sections = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->join('chapters','chapters.id','=','chapter_section.chapter_id')
            ->select('chapters.id as chapter_id','sections.title','sections.detail','sections.rank','sections.id')
            ->where('chapters.id','=',$id)
            ->orderBy('sections.rank')->get();

        $chapters = DB::table('chapters')
            ->select('chapters.id','chapters.title')
            ->orderBy('chapters.id')->get();

        $sections_title = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('sections.rank','sections.title')
            ->where('chapter_section.chapter_id','=',$id)
            ->orderBy('sections.rank')->get();

        $chapter_section = DB::table('chapter_section')
            ->join('sections','chapter_section.section_id','=','sections.id')
            ->select('sections.rank as section_rank','chapter_section.chapter_id','chapter_section.section_id')
            ->orderBy('sections.id')->get();

        return view('administer_material_submit', compact('sections','chapters','sections_title','chapter_section','id'));
    }
}

class Post extends Model
{
    protected $guarded = [];
//
}
