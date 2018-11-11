<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class ChapterController extends Controller
{
    public function chapter($id)
    {
        $sections = DB::table('sections')
            ->join('chapter_section','sections.id','=','chapter_section.section_id')
            ->join('chapters','chapters.id','=','chapter_section.chapter_id')
            ->select('sections.title','sections.detail')
            ->where('chapters.id','=',$id)
            ->orderBy('sections.rank')->get();
        return view('chapter', compact('sections'));
    }//
}
