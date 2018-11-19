<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class registerinfo3 extends Controller
{
    public function education()
    {
        $field = DB::table('register_field')
            ->select('register_field.id','register_field.name')
            ->orderBy('register_field.id')->get();

        $major = DB::table('register_major')
            ->select('register_major.id','register_major.name')
            ->orderBy('register_major.id')->get();

        return view('register_info3_stu', compact('field','major'));
    }
    //
}
