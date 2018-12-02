<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class RegisterInfoController extends Controller
{
    public function nationality()
    {
        $nationality = DB::table('register_nationality')
            ->select('register_nationality.id','register_nationality.name')
            ->orderBy('register_nationality.id')->get();

        return view('register_info1', compact('nationality'));
    }
    public function language()
    {
        $language = DB::table('register_language')
            ->select('register_language.id','register_language.name')
            ->orderBy('register_language.id')->get();

        return view('register_info2', compact('language'));
    }
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
}
