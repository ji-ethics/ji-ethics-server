<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class ChapterController extends Controller
{
    public function chapter($id)
    {
        $sections = DB::table('sections')->where('chapter_id',$id)->get();
        return view('chapter', compact('sections'));
    }//
}
