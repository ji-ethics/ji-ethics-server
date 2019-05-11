<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class RegisterInfoController extends Controller
{
    public function agreement(){
        $id = Auth::id();
        Auth::logout();
        return view('register_agreement')->with('id', $id);
    }
    public function nationality($id)
    {
        $nationality = DB::table('register_nationality')
            ->select('register_nationality.id','register_nationality.name')
            ->orderBy('register_nationality.id')->get();

        return view('register_info1', compact('nationality','id'));
    }
    public function language($id)
    {
        $language = DB::table('register_language')
            ->select('register_language.id','register_language.name')
            ->orderBy('register_language.id')->get();

        return view('register_info2', compact('language','id'));
    }
    public function education($id)
    {
        $field = DB::table('register_field')
            ->select('register_field.id','register_field.name')
            ->orderBy('register_field.id')->get();

        $major = DB::table('register_major')
            ->select('register_major.id','register_major.name')
            ->orderBy('register_major.id')->get();


        return view('register_info3_stu', compact('field','major','id'));
    }
    public function education2($id)
    {

        $major = DB::table('register_major')
            ->select('register_major.id','register_major.name')
            ->orderBy('register_major.id')->get();

        $industry = DB::table('register_industry')
            ->select('register_industry.id','register_industry.name')
            ->orderBy('register_industry.id')->get();

        return view('register_info3_nonstu', compact('major','industry','id'));
    }

    public function addagreement()
    {
        $agreement1 = $_POST["agreement1"];
        if(isset($_POST["agreement2"])){
            $agreement2 = 1;
        }
        else{
            $agreement2 = 0;
        }
        $user_id = $_POST["id"];
        DB::transaction(function () use ($agreement1, $agreement2,$user_id) {
            DB::table('registeragreement')
                ->insert([
                    'registeragreement.user_id' => $user_id,
                    'registeragreement.participate_in_study' => $agreement1,
                    'registeragreement.receive_information' => $agreement2,
                    'registeragreement.if_valid' => 1
                ]);
        });
        return redirect("register/info1/$user_id");
    }

    public function addinfo1()
    {
        $usertype = $_POST["usertype"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $nationality = $_POST["nationality"];
        $identification = $_POST["identification"];
        if ($identification == "Other") {
            $identification_other = $_POST["Input"];
        }
        else{
            $identification_other = null;
        }
        $user_id = $_POST["id"];
        DB::transaction(function () use ($usertype, $age, $gender, $nationality, $identification,$identification_other, $user_id) {
            DB::table('registerinfo1')
                ->insert([
                    'registerinfo1.user_id' => $user_id,
                    'registerinfo1.usertype' => $usertype,
                    'registerinfo1.age' => $age,
                    'registerinfo1.gender' => $gender,
                    'registerinfo1.nationality' => $nationality,
                    'registerinfo1.identification' => $identification,
                    'registerinfo1.identification_other' => $identification_other,
                    'registerinfo1..if_valid' => 1
                ]);
        });
        return redirect("register/info2/$user_id");
    }

    public function addinfo2()
    {
        $language = $_POST["language"];
        $order = $_POST["order"];
        $speaking = $_POST["speaking"];
        $listening = $_POST["listening"];
        $reading = $_POST["reading"];
        $writing = $_POST["writing"];
        $length = count($language);
        $language1 = $language[0];
        $language1_order = $order[0];
        $language1_speaking = $speaking[0];
        $language1_listening = $listening[0];
        $language1_reading = $reading[0];
        $language1_writing = $writing[0];
        if ($length >= 2){
            $language2 = $language[1];
            $language2_order = $order[1];
            $language2_speaking = $speaking[1];
            $language2_listening = $listening[1];
            $language2_reading = $reading[1];
            $language2_writing = $writing[1];
        }
        else{
            $language2 = null;
            $language2_order = null;
            $language2_speaking = null;
            $language2_listening = null;
            $language2_reading = null;
            $language2_writing = null;
        }
        if ($length >= 3){
            $language3 = $language[2];
            $language3_order = $order[2];
            $language3_speaking = $speaking[2];
            $language3_listening = $listening[2];
            $language3_reading = $reading[2];
            $language3_writing = $writing[2];
        }
        else{
            $language3 = null;
            $language3_order = null;
            $language3_speaking = null;
            $language3_listening = null;
            $language3_reading = null;
            $language3_writing = null;
        }
        if ($length >= 4){
            $language4 = $language[3];
            $language4_order = $order[3];
            $language4_speaking = $speaking[3];
            $language4_listening = $listening[3];
            $language4_reading = $reading[3];
            $language4_writing = $writing[3];
        }
        else{
            $language4 = null;
            $language4_order = null;
            $language4_speaking = null;
            $language4_listening = null;
            $language4_reading = null;
            $language4_writing = null;
        }


        $user_id = $_POST["id"];
        DB::transaction(function () use ($language1,$language1_order,$language1_speaking,$language1_listening,$language1_reading,$language1_writing,
            $language2,$language2_order,$language2_speaking,$language2_listening,$language2_reading,$language2_writing,
            $language3,$language3_order,$language3_speaking,$language3_listening,$language3_reading,$language3_writing,
            $language4,$language4_order,$language4_speaking,$language4_listening,$language4_reading,$language4_writing,$user_id) {
            DB::table('registerinfo2')
                ->insert([
                    'registerinfo2.user_id' => $user_id,
                    'registerinfo2.language1' => $language1,
                    'registerinfo2.language1_order' => $language1_order,
                    'registerinfo2.language1_speaking' => $language1_speaking,
                    'registerinfo2.language1_listening' => $language1_listening,
                    'registerinfo2.language1_reading' => $language1_reading,
                    'registerinfo2.language1_writing' => $language1_writing,
                    'registerinfo2.language2' => $language2,
                    'registerinfo2.language2_order' => $language2_order,
                    'registerinfo2.language2_speaking' => $language2_speaking,
                    'registerinfo2.language2_listening' => $language2_listening,
                    'registerinfo2.language2_reading' => $language2_reading,
                    'registerinfo2.language2_writing' => $language2_writing,
                    'registerinfo2.language3' => $language3,
                    'registerinfo2.language3_order' => $language3_order,
                    'registerinfo2.language3_speaking' => $language3_speaking,
                    'registerinfo2.language3_listening' => $language3_listening,
                    'registerinfo2.language3_reading' => $language3_reading,
                    'registerinfo2.language3_writing' => $language3_writing,
                    'registerinfo2.language4' => $language4,
                    'registerinfo2.language4_order' => $language4_order,
                    'registerinfo2.language4_speaking' => $language4_speaking,
                    'registerinfo2.language4_listening' => $language4_listening,
                    'registerinfo2.language4_reading' => $language4_reading,
                    'registerinfo2.language4_writing' => $language4_writing,
                    'registerinfo2.if_valid' => 1
                ]);
        });

        $userdata=DB::table('registerinfo1')
        ->select('registerinfo1.user_id','registerinfo1.usertype')
        ->where('registerinfo1.user_id','=',$user_id)
        ->get();
        $userdata=json_decode($userdata, true);
        foreach ($userdata as $key) {
            $usertype = $key["usertype"];
            if ($usertype == 'student') {
                return redirect("register/info3/$user_id");
            } else {
                return redirect("register/info3_non/$user_id");
            }
        }

    }

    public function addinfo3()
    {
        $education_level = $_POST["education_level"];
        if ($education_level <= "2") {
            $majoring_in = "No";
        } else {
            $majoring_in = $_POST["majoring_in"];
        }
        if ($education_level == "1") {
            $education_level = "Less than a high school diploma";
        } elseif ($education_level == "2") {
            $education_level = "High school degree or equivalent";
        } elseif ($education_level == "3") {
            $education_level = "Some college, no degree";
        } elseif ($education_level == "4") {
            $education_level = "Associate degree";
        } elseif ($education_level == "5") {
            $education_level = "Bachelor’s degree";
        } elseif ($education_level == "6") {
            $education_level = "Master’s degree";
        } elseif ($education_level == "7") {
            $education_level = "Professional degree";
        } elseif ($education_level == "8") {
            $education_level = "Doctorate";
        }
        $currently_pursuing = $_POST["currently_pursuing"];
        $major_current = $_POST["major_current"];
        $anticipated_field = $_POST["anticipated_field"];
        if ($anticipated_field == "Other") {
            $anticipated_field_other = $_POST["Input"];
        } else {
            $anticipated_field_other = null;
        }
        $parental_level = $_POST["parental_level"];
        if ($parental_level <= "2") {
            $major_parent = "No";
        } else {
            $major_parent = $_POST["major_parent"];
        }
        if ($parental_level == "1") {
            $parental_level = "Less than a high school diploma";
        } elseif ($parental_level == "2") {
            $parental_level = "High school degree or equivalent";
        } elseif ($parental_level == "3") {
            $parental_level = "Some college, no degree";
        } elseif ($parental_level == "4") {
            $parental_level = "Associate degree";
        } elseif ($parental_level == "5") {
            $parental_level = "Bachelor’s degree";
        } elseif ($parental_level == "6") {
            $parental_level = "Master’s degree";
        } elseif ($parental_level == "7") {
            $parental_level = "Professional degree";
        } elseif ($parental_level == "8") {
            $parental_level = "Doctorate";
        }
        $income_rmb = $_POST["income_rmb"];
        $user_id = $_POST["id"];
        DB::transaction(function () use (
            $education_level, $majoring_in, $currently_pursuing, $major_current,
            $anticipated_field, $anticipated_field_other, $parental_level, $major_parent, $income_rmb, $user_id
        ) {
            DB::table('registerinfo3')
                ->insert([
                    'registerinfo3.user_id' => $user_id,
                    'registerinfo3.education_level' => $education_level,
                    'registerinfo3.majoring_in' => $majoring_in,
                    'registerinfo3.currently_pursuing' => $currently_pursuing,
                    'registerinfo3.major_current' => $major_current,
                    'registerinfo3.anticipated_field' => $anticipated_field,
                    'registerinfo3.anticipated_field_other' => $anticipated_field_other,
                    'registerinfo3.parental_level' => $parental_level,
                    'registerinfo3.major_parent' => $major_parent,
                    'registerinfo3.income_rmb' => $income_rmb,
                    'registerinfo3.if_valid' => 1
                ]);
        });

        return redirect("register/info4/$user_id");
    }

    public function addinfo3_non()
    {
        $education_level = $_POST["education_level"];
        if ($education_level <= "2"){
            $major_in = Null;
        }
        else {
            $major_in = $_POST["major_in"];
        }
        if ($education_level == "1"){$education_level = "Less than a high school diploma";}
        elseif ($education_level == "2"){$education_level = "High school degree or equivalent";}
        elseif ($education_level == "3"){$education_level = "Some college, no degree";}
        elseif ($education_level == "4"){$education_level = "Associate degree";}
        elseif ($education_level == "5"){$education_level = "Bachelor’s degree";}
        elseif ($education_level == "6"){$education_level = "Master’s degree";}
        elseif ($education_level == "7"){$education_level = "Professional degree";}
        elseif ($education_level == "8"){$education_level = "Doctorate";}
        $industry = $_POST["industry"];
        if ($industry == "Other") {
            $industry_other = $_POST["Input"];
        }
        else{
            $industry_other = null;
        }
        $work_position = $_POST["work_position"];
        if ($work_position == "Other") {
            $work_position_other = $_POST["Input"];
        }
        else{
            $work_position_other = null;
        }
        $income_rmb = $_POST["income_rmb"];
        $user_id = $_POST["id"];
        DB::transaction(function () use ($education_level, $major_in,
            $industry, $industry_other, $work_position, $work_position_other, $income_rmb, $user_id) {
            DB::table('registerinfo3_2')
                ->insert([
                    'registerinfo3_2.user_id' => $user_id,
                    'registerinfo3_2.education_level' => $education_level,
                    'registerinfo3_2.major_in' => $major_in,
                    'registerinfo3_2.industry' => $industry,
                    'registerinfo3_2.industry_other' => $industry_other,
                    'registerinfo3_2.work_position' => $work_position,
                    'registerinfo3_2.work_position_other' => $work_position_other,
                    'registerinfo3_2.income_rmb' => $income_rmb,
                    'registerinfo3_2.if_valid' => 1
                ]);
        });
        return redirect("register/info4/$user_id");
    }

    public function addinfo4()
    {
        $affiliation = $_POST["affiliation"];
        $political_orientation = $_POST["political_orientation"];
        if ($affiliation == "Other") {
            $affiliation_other = $_POST["Input"];
        }
        else{
            $affiliation_other = null;
        }
        $user_id = $_POST["id"];
        DB::transaction(function () use ($user_id, $affiliation, $political_orientation,$affiliation_other) {
            DB::table('registerinfo4')
                ->insert([
                    'registerinfo4.user_id' => $user_id,
                    'registerinfo4.affiliation' => $affiliation,
                    'registerinfo4.political_orientation' => $political_orientation,
                    'registerinfo4.affiliation_other' => $affiliation_other,
                    'registerinfo4.if_valid' => 1
                ]);
        });
        DB::table('users')->where('id', '=', $user_id)->update(['is_active' => 1]);
        Auth::loginUsingId($user_id);
        return redirect("/");
    }

}
