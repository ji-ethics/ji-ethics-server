@extends('admin.Header')
@section('content')


    <div class="row" style="margin:2%;">
    <div class="col-xs-1 col-sm-1 col-md-1"></div>
    <div class="col-xs-12 col-sm-10 col-md-10">
        <caption><h1 class="text-center">User Detail</h1></caption>
        <br>
        <table class = "table table-hover">
        <tbody style="font-size:20px;text-align:center;vertical-align:middle">
        <?php
        $basicinfo1 = json_decode($basicinfo,true);
        foreach($basicinfo1 as $key)
            {
                $user_id = $key['id'];
                $users_username = $key['user_name'];
                $users_email = $key['email'];
                $users_firstname = $key['first_name'];
                $users_lastname = $key['last_name'];
                $users_usertype = $key['usertype'];
                $users_age = $key['age'];
                $users_gender = $key['gender'];
                $users_nationality = $key['nationality'];
                $users_identification = $key['identification'];
                if ($users_identification == "Other")
                    {
                        $users_identification = $key['identification_other'];
                    }
                echo"<tr>";
                echo"<th>Username</th>";
                echo"<td>$users_username</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>Email</th>";
                echo"<td>$users_email</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>First Name</th>";
                echo"<td>$users_firstname</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>Last Name</th>";
                echo"<td>$users_lastname</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>User Type</th>";
                echo"<td>$users_usertype</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>Age</th>";
                echo"<td>$users_age</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>Gender</th>";
                echo"<td>$users_gender</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>Nationality</th>";
                echo"<td>$users_nationality</td>";
                echo"</tr>";
            }
        ?>
        </tbody>
        </table>
        <br>
        <br>
        <caption><h1 class="text-center">Language Information</h1></caption>
        <br>
        <table class = "table table-hover">
            <tbody style="font-size:15pt;text-align:center;vertical-align:middle">
            <?php
            $languageinfo = json_decode($languageinfo,true);
            foreach($languageinfo as $key)
            {
                $language1 = $key['language1'];
                $language1_order = $key['language1_order'];
                $language1_speaking = $key['language1_speaking'];
                $language1_listening = $key['language1_listening'];
                $language1_reading = $key['language1_reading'];
                $language1_writing = $key['language1_writing'];
                echo"<tr>";
                echo"<th width=\"25%\">Language</th>";
                echo"<td width=\"25%\">$language1</td>";
                echo"<th width=\"25%\">Ratings of languages</th>";
                echo"<td width=\"25%\">$language1_order</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>Proficiency in Speaking </th>";
                echo"<td>$language1_speaking</td>";
                echo"<th>Proficiency in listening</th>";
                echo"<td>$language1_listening</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>Proficiency in Writing </th>";
                echo"<td>$language1_writing</td>";
                echo"<th>Proficiency in Reading</th>";
                echo"<td>$language1_reading</td>";
                echo"</tr>";

                if ($key['language2']!=null){
                    echo"</tbody>";
                    echo"</table>";
                    echo "<br>";
                    echo "<table class = \"table table-hover\">";
                    echo "<tbody style=\"font-size:15pt;text-align:center;vertical-align:middle\">";
                    $language2 = $key['language2'];
                    $language2_order = $key['language2_order'];
                    $language2_speaking = $key['language2_speaking'];
                    $language2_listening = $key['language2_listening'];
                    $language2_reading = $key['language2_reading'];
                    $language2_writing = $key['language2_writing'];
                    echo"<tr>";
                    echo"<th width=\"25%\">Language</th>";
                    echo"<td width=\"25%\">$language2</td>";
                    echo"<th width=\"25%\">Ratings of languages</th>";
                    echo"<td width=\"25%\">$language2_order</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<th>Proficiency in Speaking </th>";
                    echo"<td>$language2_speaking</td>";
                    echo"<th>Proficiency in listening</th>";
                    echo"<td>$language2_listening</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<th>Proficiency in Writing </th>";
                    echo"<td>$language2_writing</td>";
                    echo"<th>Proficiency in Reading</th>";
                    echo"<td>$language2_reading</td>";
                    echo"</tr>";
                }
                if ($key['language3']!=null){
                    echo"</tbody>";
                    echo"</table>";
                    echo "<br>";
                    echo "<table class = \"table table-hover\">";
                    echo "<tbody style=\"font-size:15pt;text-align:center;vertical-align:middle\">";
                    $language3 = $key['language3'];
                    $language3_order = $key['language3_order'];
                    $language3_speaking = $key['language3_speaking'];
                    $language3_listening = $key['language3_listening'];
                    $language3_reading = $key['language3_reading'];
                    $language3_writing = $key['language3_writing'];
                    echo"<tr>";
                    echo"<th width=\"25%\">Language</th>";
                    echo"<td width=\"25%\">$language3</td>";
                    echo"<th width=\"25%\">Ratings of languages</th>";
                    echo"<td width=\"25%\">$language3_order</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<th>Proficiency in Speaking </th>";
                    echo"<td>$language3_speaking</td>";
                    echo"<th>Proficiency in listening</th>";
                    echo"<td>$language3_listening</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<th>Proficiency in Writing </th>";
                    echo"<td>$language3_writing</td>";
                    echo"<th>Proficiency in Reading</th>";
                    echo"<td>$language3_reading</td>";
                    echo"</tr>";
                }
                if ($key['language4']!=null){
                    echo"</tbody>";
                    echo"</table>";
                    echo "<br>";
                    echo "<table class = \"table table-hover\">";
                    echo "<tbody style=\"font-size:15pt;text-align:center;vertical-align:middle\">";
                    $language4 = $key['language4'];
                    $language4_order = $key['language4_order'];
                    $language4_speaking = $key['language4_speaking'];
                    $language4_listening = $key['language4_listening'];
                    $language4_reading = $key['language4_reading'];
                    $language4_writing = $key['language4_writing'];
                    echo"<tr>";
                    echo"<th width=\"25%\">Language</th>";
                    echo"<td width=\"25%\">$language4</td>";
                    echo"<th width=\"25%\">Ratings of languages</th>";
                    echo"<td width=\"25%\">$language4_order</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<th>Proficiency in Speaking </th>";
                    echo"<td>$language4_speaking</td>";
                    echo"<th>Proficiency in listening</th>";
                    echo"<td>$language4_listening</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<th>Proficiency in Writing </th>";
                    echo"<td>$language4_writing</td>";
                    echo"<th>Proficiency in Reading</th>";
                    echo"<td>$language4_reading</td>";
                    echo"</tr>";
                }
            }
            ?>
            </tbody>
        </table>
        <br>
        <br>
        <caption><h1 class="text-center">Enducational Background</h1></caption>
        <br>
        <table class = "table table-hover">
            <tbody style="font-size:20px;text-align:center;vertical-align:middle">
            <?php
            $basicinfo2 = json_decode($basicinfo,true);
            $educationalinfo = json_decode($educationalinfo,true);
            foreach($educationalinfo as $key)
            {
                if ($basicinfo2[0]['usertype'] == "student")
                {
                $educational_level = $key['education_level'];
                $current = $key['currently_pursuing'];
                $major_current = $key['major_current'];
                $Antifield = $key['anticipated_field'];
                if ($Antifield == "Other")
                    {
                        $Antifield = $key['anticipated_field_other'];
                    }
                $parental_level = $key['parental_level'];
                $income = $key['income_rmb'];
                echo"<tr>";
                echo"<th width =\"50%\">Highest Educational Degree Achieved</th>";
                echo"<td width =\"50%\">$educational_level</td>";
                echo"</tr>";
                if($key['majoring_in']!= "No"){
                $majoring = $key['majoring_in'];
                echo"<tr>";
                echo"<th>Majoring in</th>";
                echo"<td>$majoring</td>";
                echo"</tr>";
                }
                echo"<tr>";
                echo"<th>Current Pursuing Degree</th>";
                echo"<td>$current</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>Current Major</th>";
                echo"<td>$major_current</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>Anticipated Field</th>";
                echo"<td>$Antifield</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>Highest parental education level</th>";
                echo"<td>$parental_level</td>";
                echo"</tr>";
                    if($key['major_parent']!= "No"){
                        $major_parent = $key['major_parent'];
                        echo"<tr>";
                        echo"<th>Major of Parents</th>";
                        echo"<td>$major_parent</td>";
                        echo"</tr>";
                    }
                echo"<tr>";
                echo"<th>Income in RMB</th>";
                echo"<td>$income</td>";
                echo"</tr>";
                }
                else {
                    $educational_level = $key['education_level'];
                    $industry = $key['industry'];
                    if ($industry == "Other")
                    {
                        $industry = $key['industry_other'];
                    }
                    $work_position = $key['work_position'];
                    if ($work_position == "Other")
                    {
                        $work_position = $key['work_position_other'];
                    }
                    $income = $key['income_rmb'];
                    echo"<tr>";
                    echo"<th width =\"50%\"> Highest Educational Degree Achieved</th>";
                    echo"<td width =\"50%\"> $educational_level</td>";
                    echo"</tr>";
                    if($key['major_in']!= "No"){
                        $majoring = $key['major_in'];
                        echo"<tr>";
                        echo"<th>Major in</th>";
                        echo"<td>$majoring</td>";
                        echo"</tr>";
                    }
                    echo"<tr>";
                    echo"<th>Work industry</th>";
                    echo"<td>$industry</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<th>Work Position</th>";
                    echo"<td>$work_position</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<th>Income in RMB</th>";
                    echo"<td>$income</td>";
                    echo"</tr>";
                }
            }
            ?>
            </tbody>
        </table>
        <br>
        <br>
        <caption><h1 class="text-center">Religious Background</h1></caption>
        <br>
        <table class = "table table-hover">
            <tbody style="font-size:20px;text-align:center;vertical-align:middle">
            <?php
            $religiousinfo = json_decode($religiousinfo,true);
            foreach($religiousinfo as $key)
            {
                $political_orientation = $key['political_orientation'];
                $affiliation = $key['affiliation'];
                if ($affiliation == "Other")
                {
                    $affiliation = $key['affiliation_other'];
                }
                echo"<tr>";
                echo"<th width =\"50%\">Affiliation</th>";
                echo"<td width =\"50%\">$affiliation</td>";
                echo"</tr>";
                echo"<tr>";
                echo"<th>Political Orientation</th>";
                echo"<td>$political_orientation</td>";
                echo"</tr>";
            }
            ?>
            </tbody>
        </table>
        <br><br><br>
        <div class="text-center">
        <?php
            $userinfo = json_decode($basicinfo,true);
            $user_id = $userinfo[0]['id'];
            $link_delete = url("/user/delete/$user_id");
            echo"<th><a class=\"btn btn-default\" href= $link_delete onclick =\"return delete_confirm()\"> delete</a></th>";
            echo"<br>";
            echo"<br>";
            $link_user = url("/users");
            echo"<a class=\"btn btn-default\" href=$link_user >Back</a>";
        ?>
        </div>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1"></div>

</div>
@endsection

@section('script')
    @parent
<script type="text/javascript">
function delete_confirm()
{
    var msg = "Do you want to delete this user?";
    if (confirm(msg)){
        return true;
    }else{
        return false;
    }
}
</script>
    @endsection