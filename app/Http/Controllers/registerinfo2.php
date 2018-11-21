<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class registerinfo2 extends Controller
{
    public function language()
    {
        $language = DB::table('register_language')
            ->select('register_language.id','register_language.name')
            ->orderBy('register_language.id')->get();

        return view('register_info2', compact('language'));
    }
    //
}
