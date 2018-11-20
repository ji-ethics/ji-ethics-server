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

        $select=$_POST['title'];

        $sections = DB::table('sections')
        ->join('chapter_section','sections.id','=','chapter_section.section_id')
        ->join('chapters','chapters.id','=','chapter_section.chapter_id')
        ->select('chapters.id as chapter_id','sections.title','sections.detail','sections.rank','sections.id')
        ->where('chapters.id','=',$select)
        ->orderBy('sections.rank')->get();



        return view('administer_material_submit',compact('sections'));
    }
}

class Post extends Model
{
    protected $guarded = [];
//
}
