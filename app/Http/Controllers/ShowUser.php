<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ShowUser extends Controller
{
    public function getusers()
    {
        $allusers = DB::table('users')
            ->join('registerinfo1','users.id','=','registerinfo1.user_id')
            ->select('users.id','users.user_name','users.email','users.first_name','users.last_name','users.is_active',
                'registerinfo1.usertype','registerinfo1.age','registerinfo1.gender','registerinfo1.nationality')
            ->where('users.is_active','=',1)
            ->orderBy('users.id')->get();


        return view('show_users', compact('allusers'));
    }

    public function userdetail($id){
        $basicinfo = DB::table('users')
            ->join('registerinfo1','users.id','=','registerinfo1.user_id')
            ->select('users.id','users.user_name','users.email','users.first_name','users.last_name','users.is_active',
                'registerinfo1.usertype','registerinfo1.age','registerinfo1.gender','registerinfo1.nationality',
                'registerinfo1.identification','registerinfo1.identification_other')
            ->where('users.is_active','=',1)
            ->where('users.id','=',$id)
            ->orderBy('users.id')->get();

        $userdata=DB::table('registerinfo1')
            ->select('registerinfo1.user_id','registerinfo1.usertype')
            ->where('registerinfo1.user_id','=',$id)
            ->get();

        $userdata=json_decode($userdata, true);

        $languageinfo = DB::table('registerinfo2')
            ->where('registerinfo2.user_id','=',$id)
            ->orderBy('registerinfo2.user_id')->get();

        if ($userdata[0]["usertype"] == 'student') {
            $educationalinfo = DB::table('registerinfo3')
                ->where('registerinfo3.user_id','=',$id)
                ->orderBy('registerinfo3.user_id')->get();
        } else {
            $educationalinfo = DB::table('registerinfo3_2')
                ->where('registerinfo3_2.user_id','=',$id)
                ->orderBy('registerinfo3_2.user_id')->get();
        }

        $religiousinfo = DB::table('registerinfo4')
            ->where('registerinfo4.user_id','=',$id)
            ->orderBy('registerinfo4.user_id')->get();

        return view('show_users_detail', compact('basicinfo','languageinfo','educationalinfo','religiousinfo'));
    }

    public function deleteuser($id){
        DB::table('users')
            ->select('users.id','users.is_active')
            ->where('users.id','=',$id)
            ->update([
                'users.is_active' => 0
            ]);

        return redirect("/users");
    }
}
