@extends('admin.Header')
@section('content')
<div class="padding">

    <div><h1>Survey material</h1></div>


    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">

<?php

        echo"<br/>";
            echo"<br/>";
            echo"<br/>";
        echo"<table class=\"table table-hover\">";
        echo"<tr>";
        echo"<th>Survey id</th><th>Survey title</th><th>Link to Check</th><th>Link to Modify</th><th>Delete</th>";
        echo"</tr>";
        $survey = json_decode($survey_question,true);
        foreach($survey as $survey_value)
            {
                echo"<tr>";
                $survey_id = $survey_value['id'];
                $survey_title = $survey_value['title'];
                echo"<th>$survey_id</th>";
                echo"<th>$survey_title</th>";
                $link_sec = url("/modify/survey/$survey_id");
                $link_sec_check = url("/check/survey/$survey_id");
                echo"<th><a class=\"btn btn-default\" href= $link_sec_check>Check questions</a></th>";
                echo"<th><a class=\"btn btn-default\" href= $link_sec>Change title</a></th>";
                $link_delete = url("/delete/survey/$survey_id");
                echo"<th><a href=$link_delete onclick = \"return confirm('Do you wanna delete the survey?');\" class=\"btn btn-default\" >delete</a></th>";
                echo"</tr>";
            }

        echo"</table>";

            $link_add_survey = url("/addnewsurvey");

            echo"<a class=\"btn btn-default\" href= $link_add_survey>Add a new survey</a>";




?>



    <div class="col-xs-1 col-sm-2 col-md-2"></div>
</div>
</div>
</div>
@endsection