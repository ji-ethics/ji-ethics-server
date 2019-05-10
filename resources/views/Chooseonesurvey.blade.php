@extends('layouts.app')
@section('content')
<div class="padding">

    <div><h1>Please choose a survey</h1></div>


    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">

<?php

        echo"<br/>";
            echo"<br/>";
            echo"<br/>";
        echo"<table class=\"table table-hover\">";
        echo"<tr>";
        echo"<th>Survey id</th><th>Survey title</th><th>Do this survey</th>";
        echo"</tr>";
        $survey = json_decode($survey_question,true);
        foreach($survey as $survey_value)
            {
                echo"<tr>";
                $survey_id = $survey_value['id'];
                $survey_title = $survey_value['title'];
                echo"<th>$survey_id</th>";
                echo"<th>$survey_title</th>";

                $link_do = url("/surveys/$survey_id");
                echo"<th><a href=$link_do  class=\"btn btn-default\" >Do it</a></th>";
                echo"</tr>";
            }

        echo"</table>";

            $link_add_survey = url("/homepage");

            echo"<a class=\"btn btn-default\" href= $link_add_survey>Back to the homepage</a>";


            echo"<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>"

?>



    <div class="col-xs-1 col-sm-2 col-md-2"></div>
</div>
</div>
</div>
@endsection