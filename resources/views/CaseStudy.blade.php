<!DOCTYPE HTML>
<html lang = "en">
<head>

    <meta charset="UTF-8">
    <title>Case Study Page</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

@include('Header')




<div class = "row">
    <div class="col-md-2"></div>
    <div class="col-md-2">

        <div class="thumbnail fixed-top">
            <div id = "navsecond">

                <h2>Chapters</h2>
                <ul id="main-nav" class="nav nav-tabs nav-stacked" style="">
                    <?php
                        $chapters = json_decode($chapters, true);
                        $case_study = json_decode($case_study,true);
                        //var_dump($sections[0]["chapter_id"]);

                    echo "<li>";
                        foreach ($chapters as $ch_value)
                            {
                                $chapter_id = $ch_value["id"];
                                $title = $ch_value["title"];
                                $link1 = url("chapter/$chapter_id/section/1");

                                echo "<li><a href = $link1 class=\"glyphicon glyphicon-globe\">Chapter $chapter_id. <br>$title</a></li>";
                            }
                        foreach ($case_study as $ca_value)
                            {
                                $case_id = $ca_value["id"];
                                $ca_title = $ca_value["title"];
                                $link2 = url("casestudy/$case_id/step/1");

                                echo "<li><a href = $link2 class=\"glyphicon glyphicon-globe\">Case Study $case_id. <br>$ca_title</a></li>";
                            }

                    echo "</li>";//No li element in scope but a li end tag seen.

                        ?>
                        <!--foreach ($data as $key => $value)
                        {
                            $section_id = $value["rank"];
                            $title = $value["title"];
                            echo "<li><a href = \"#\">Chapter .$section_id./..$title</a></li>";
                        }-->

                </ul>


            </div>
        </div>

    </div>
    <div class="col-md-6">
        <?php

        $step_question = json_decode($case_question,true);
        $principles = json_decode($principle,true);
        $user_answer = json_decode($answer,true);
        //print
        $user_id = 1;
        $case_id = $id;
        foreach ($case_study as $case_value)
        {
            if ($case_value['id'] == $id and $step_id<=3)
            {
            $details = $case_value["details"];
            $title = $case_value["title"];
            $reference = $case_value["reference"];

            echo "<h2>$title</h2>";
            echo "<p>$details</p>";

            echo "<br/>";
            echo "<br/>";

            echo "<h4>Reference</h4>";
            echo "<p>$reference</p>";

            echo "<br/>";
            echo "<br/>";
            }
        }
        $count = 0;//a step counter for me to print the principles
        if ($step_id == 2)
            {

            }
        elseif ($step_id == 6)
        {
            foreach($principles as $prin_value)
                {
                    if ($count == $prin_value["id"]-1)
                        {
                            $title = $prin_value["title"];
                            echo "<h5>$title</h5>";
                            $count = $prin_value["id"];
                            echo "<br/>";
                        }
                        $prin_id = $prin_value["detail_id"];
                        $prin_detail = $prin_value["details"];
                        echo "<p>$prin_id. $prin_detail</p>";

                }
        }
            echo "<h2>Case study step $step_id</h2>";
?>

            <form action="/casestudyanswer_edit" method="POST" target="nm_iframe">

            {{ csrf_field() }}
<?php
                foreach ($step_question as $ques_value)
                {

                    $ques_id = $ques_value["question_id"];
                    $ques_detail = $ques_value["question_detail"];
                    $question_id = $ques_id;
                    foreach ($user_answer as $pre_answer)
                    {
                        if($pre_answer['user_id'] == $user_id and $ques_id == $pre_answer['question_id'])
                            {
                                $pre_user_answer = $pre_answer['question_answer'];
                                break;
                            }
                    }
                    echo "<label>$ques_detail</label>";

                    echo "<div class=\"form-group\">";
                    echo "<textarea name=\"question_answer[]\"  id=\"content\" style=\"height:80px;max-height:500px;\" class=\"form-control\" placeholder=\"Please input your answer in the box\">";
                    if (isset($pre_user_answer)) {
                        echo "$pre_user_answer";
                    }
                    unset($pre_user_answer);
                    echo "</textarea>";
                    echo "</div>";


                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"question_id[]\"  id=\"content\" style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $question_id;
                    echo"</textarea>";
                    echo "</div>";


                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"user_id[]\"  id=\"content\" style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $user_id;
                    echo"</textarea>";
                    echo "</div>";

                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"step_id[]\"  id=\"content\" style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $step_id;
                    echo"</textarea>";
                    echo "</div>";

                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"case_id[]\"  id=\"content\" style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $case_id;
                    echo"</textarea>";
                    echo "</div>";




                }
///////////////////////////////////////////////////////////////////////////////




            echo"<button type=\"submit\" class=\"btn btn-default\" >submit</button>";
            echo "<br/>";
            echo "<br/>";
            echo "</form>";

            echo "<iframe id=\"id_iframe\" name=\"nm_iframe\" style=\"display:none;\"></iframe>";

                echo"<div class = \"text-center\">";
                echo"<nav aria-label=\"Page navigation\">";
                echo"<ul class=\"pagination\">";
                echo"<li>";

                $link_pre = url("casestudy/$id/step/$step_id");
                $link_next = url("casestudy/$id/step/$step_id");

                if ($step_id>=2 and $step_id<=9)
                {
                    $step_pre = $step_id-1;
                    $step_next = $step_id+1;
                    $link_pre = url("casestudy/$id/step/$step_pre");
                    $link_next = url("casestudy/$id/step/$step_next");

                    echo"<a class=\"btn btn-default\" href= $link_pre>Previous</a>";

                    echo"<a class=\"btn btn-default\" href= $link_next>Next</a>";

                }
                elseif($step_id == 1)
                {
                    $step_pre = $step_id;
                    $step_next = $step_id+1;
                    $link_pre = url("casestudy/$id/step/$step_pre");
                    $link_next = url("casestudy/$id/step/$step_next");

                    echo"<a class=\"btn btn-default\" href= $link_pre>Previous</a>";
                    echo"<a class=\"btn btn-default\" href= $link_next>Next</a>";

                }
                elseif($step_id == 10)
                {
                    $step_pre = $step_id-1;
                    $step_next = $step_id;
                    $link_pre = url("casestudy/$id/step/$step_pre");
                    $submit = url("homepage");

                    echo"<a class=\"btn btn-default\" href= $link_pre>Previous</a>";

                    echo"<a class=\"btn btn-default\" href= $submit>Finished</a>";

                }
                echo"</li>";
                echo"</ul>";
                echo"</nav>";
                echo"<br/>";
                echo"<br/>";
                echo"<br/>";
                echo"</div>";
        ?>



    </div>
</div>

@include('Footer')

</body>
</html>

