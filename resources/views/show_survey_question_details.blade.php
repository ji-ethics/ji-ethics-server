@extends('admin.Header')
@section('content')
<div class="padding">

    <div>
        <?php
            echo"<h1>Survey $id</h1>";
        ?>
    </div>
    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">

<?php

        echo"<br/>";
            echo"<br/>";
            echo"<br/>";
        echo"<table class=\"table table-hover\">";
        echo"<tr>";
        echo"<th>Question details</th><th>Delete</th>";
        echo"</tr>";
            $survey_detail_question = json_decode($survey_detail_question,true);
        foreach($survey_detail_question as $survey_value)
            {
                echo"<tr>";
                $question_id = $survey_value['id'];
                $question_detail = $survey_value['detail'];
                echo"<th>$question_detail</th>";
                $link_delete = url("/delete/surveyquestion/$id/$question_id");
                echo"<th><a href=$link_delete onclick = \"return confirm('Do you wanna delete the survey?');\" class=\"btn btn-default\" >delete</a></th>";
                echo"</tr>";
            }

        echo"</table>";

            $link_add_survey = url("/addnewsurveyquestinos/$id");

            echo"<a class=\"btn btn-default\" href= $link_add_survey>Add a question</a>";

?>



    <div class="col-xs-1 col-sm-2 col-md-2"></div>
</div>
</div>
</div>
<?php
        echo"<br/>";
        echo"<br/>";
        echo"<br/>";

        echo"<div class = \"text-center\">";
            $link_back = url("showsurvey");
            echo"<a class=\"btn btn-default\" href= $link_back>Back to Show Survey Page</a>";
            echo"</div>";

        echo"<br/>";
        echo"<br/>";
        echo"<br/>";
?>
@endsection