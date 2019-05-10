@extends('admin.Header')
@section('content')
<div class="padding">

    <?php
        echo"<div><h1>Modify Survey $id Content</h1></div>"
    ?>

    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">
            <form action="/surveydetail_edit" method="POST" target="nm_iframe">

                {{ csrf_field() }}
                <?php
                    echo"<br/><br/><br/>";
                $survey_question = json_decode($survey_question,true);
                foreach ($survey_question as $survey_details)
                {
                    $pre_survey_title = $survey_details['title'];
                    for ($i = 0;$i<=5;$i++)
                        {
                            $pre_choice[$i] = $survey_details['choice'.$i];
                        }

                    echo "<h3>Survey Title</h3>";
                    echo "<div class=\"form-group\">";
                    echo "<textarea name=\"title\"    style=\"height:60px\" class=\"form-control\" placeholder=\"Please input your answer in the box\">";
                    echo "$pre_survey_title";
                    echo "</textarea>";
                    echo "</div>";
                    for ($i = 0;$i<=5;$i++)
                    {
                        echo "<label>Choice $i</label>";
                        echo "<div class=\"form-group\">";
                        echo "<textarea name=\"choice$i\"    style=\"height:40px\" class=\"form-control\" placeholder=\"Please input your answer in the box\">";
                        echo "$pre_choice[$i]";
                        echo "</textarea>";
                        echo "</div>";
                    }


                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"survey_id\"  style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $id;
                    echo"</textarea>";
                    echo "</div>";


                }

                    echo"<button type=\"submit\" class=\"btn btn-default\" >submit</button>";
                    echo "<br/>";
                    echo "<br/>";
                ?>
            </form>
<?php
                    echo "<iframe id=\"id_iframe\" name=\"nm_iframe\" style=\"display:none;\"></iframe>";
                    echo"<br/>";
                    echo"<br/>";
                    echo"<br/>";

                    echo"<div class = \"text-center\">";
                    $link_back = url("/showsurvey");
                    echo"<a class=\"btn btn-default\" href= $link_back>Back to Check Page</a>";
                    echo"</div>";

                echo"<br/>";
                echo"<br/>";
                echo"<br/>";
?>







        </div>


        <div class="col-md-2"></div>




    </div>


    <div class="col-xs-1 col-sm-2 col-md-2"></div>
</div>
@endsection