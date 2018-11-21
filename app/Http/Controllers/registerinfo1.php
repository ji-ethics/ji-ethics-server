<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;


class registerinfo1 extends Controller
{
    public function nationality()
    {
        $nationality = DB::table('register_nationality')
            ->select('register_nationality.id','register_nationality.name')
            ->orderBy('register_nationality.id')->get();

        return view('register_info1', compact('nationality'));
    }

    //
}
