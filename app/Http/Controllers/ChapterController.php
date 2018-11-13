<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class ChapterController extends Controller
{
    public function chapter($id,$section_rank)
    {
        $sections = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->join('chapters','chapters.id','=','chapter_section.chapter_id')
            ->select('chapters.id as chapter_id','sections.title','sections.detail','sections.rank')
            ->where('chapters.id','=',$id)
            ->where('sections.rank','=',$section_rank)
            ->orderBy('sections.rank')->get();

        $chapters = DB::table('chapters')
            ->select('chapters.id','chapters.title')
            ->orderBy('chapters.id')->get();

        $sections_title = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->select('sections.rank','sections.title')
            ->where('chapter_section.chapter_id','=',$id)
            ->orderBy('sections.rank')->get();
        return view('chapter', compact('sections','chapters','sections_title'));
    }
}
