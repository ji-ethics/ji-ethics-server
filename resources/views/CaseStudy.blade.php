@extends('layouts.app')
@section('content')

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

                    echo "<li class = \"list-group\">";
                        foreach ($chapters as $ch_value)
                            {
                                $chapter_id = $ch_value["id"];
                                $title = $ch_value["title"];
                                $link1 = url("chapter/$chapter_id/section/1");

                                echo "<li><a href = $link1 class=\"list-group-item list-group-item-success\">Chapter $chapter_id. <br>$title</a></li>";
                            }
                    echo"<h2>Case Studies</h2>";

                    foreach ($case_study as $ca_value)
                            {
                                $case_id = $ca_value["id"];
                                $ca_title = $ca_value["title"];
                                $link2 = url("casestudy/$case_id/step/1");

                                if ($case_id == $id){
                                    echo "<li><a href = $link2 class=\"list-group-item active\">Case Study $case_id. <br>$ca_title</a></li>";
                                }
                                else{
                                    echo "<li><a href = $link2 class=\"list-group-item\">Case Study $case_id. <br>$ca_title</a></li>";
                                }
                            }

                   // echo "</li>";//No li element in scope but a li end tag seen.

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
        ////////////////////////////////////////////////////////////to do
        $case_id = $id;
        foreach ($case_study as $case_value)
        {
            if ($case_value['id'] == $id)
            {
            $details = $case_value["details"];
            $title = $case_value["title"];
            $reference = $case_value["reference"];

            echo "<h2>$title</h2>";

            echo "<p style=\"text-align:justify; text-justify:inter-ideograph;\">";
            echo "$details";
            echo "<br/>";
                echo "<br/>";
            echo "Reference:";
                echo "<br/>";
                echo "<br/>";
            echo "$reference";
            echo "</p>";
            echo "<br/>";

            echo "<br/>";

            }
        }
     if ($step_id == 6)
            {
                $count = 0;//a step counter for me to print the principles
                echo "<h3>Ethical Principles</h3>";

                echo "<textarea name=\"title\"   style=\"height:500px\" class=\"form-control\" placeholder=\"Please input your answer in the box\" readonly=\"readonly\">";
                foreach($principles as $prin_value)
                {
                    if ($count == $prin_value["id"]-1)
                    {
                        $title = $prin_value["title"];
                        echo "\n$title\n";
                        $count = $prin_value["id"];

                    }
                    $prin_id = $prin_value["detail_id"];
                    $prin_detail = $prin_value["details"];
                    echo "$prin_id. $prin_detail\n";

                }
                echo"</textarea>";
            }
            echo "<br/><br/><br/>";
            echo "<h3>Case study step $step_id</h3>";
?>

            <form action="/casestudyanswer_edit" method="POST" onsubmit="return CheckIP()">

            {{ csrf_field() }}
<?php
                foreach ($step_question as $ques_value)
                {
                    if($ques_value['step_id'] == $step_id)
                    {
                    $ques_id = $ques_value["question_id"];
                    $ques_detail = $ques_value["question_detail"];
                    $question_id = $ques_id;
                    foreach ($user_answer as $pre_answer)
                    {
                        if($ques_id == $pre_answer['question_id'] and $pre_answer['step_id'] == $step_id)
                            {
                                $pre_user_answer = $pre_answer['question_answer'];
                                break;
                            }
                    }
                    echo "<label>$ques_detail</label>";

                    echo "<div class=\"form-group\">";
                    echo "<textarea name=\"question_answer[]\"   style=\"height:80px;max-height:500px;\" class=\"form-control\" placeholder=\"Please input your answer in the box\">";
                    if (isset($pre_user_answer)) {
                        echo "$pre_user_answer";
                    }
                    unset($pre_user_answer);
                    echo "</textarea>";
                    echo "</div>";


                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"question_id[]\"   style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $question_id;
                    echo"</textarea>";
                    echo "</div>";


                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"step_id[]\"   style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $step_id;
                    echo"</textarea>";
                    echo "</div>";

                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"case_id[]\"   style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $case_id;
                    echo"</textarea>";
                    echo "</div>";


                    }
                }
///////////////////////////////////////////////////////////////////////////////


            #submit is at here
            echo"<button type=\"submit\" class=\"btn btn-default\" >submit</button>";
            echo "<br/>";
            echo "<br/>";
            ?>
            </form>
            <?php
            if ($step_id == 2)
            {

                foreach ($user_answer as $pre_answer)
                {
                    if($pre_answer['question_id'] == 1 and $pre_answer['step_id'] == 1)
                    {
                        $pre_user_answer_1 = $pre_answer['question_answer'];
                        break;
                    }
                }
                $question_1 = $step_question[0]['question_detail'];
                echo "<h4>Case Study Step 1</h4>";
                echo "<label>The following is the answer of your case study step 1.<br/>$question_1</label>";
                if (isset($pre_user_answer_1)) {
                    echo "$pre_user_answer_1";
                }
                else {
                    echo"<p>no previous answer</p>";
                }
                echo"<br/>";
                echo"<br/>";
                echo"<br/>";
            }
            elseif($step_id == 3)
            {
                foreach ($user_answer as $pre_answer)
                {
                    if( $pre_answer['question_id'] == 1 and $pre_answer['step_id'] == 2)
                    {
                        $pre_user_answer_2 = $pre_answer['question_answer'];
                        break;
                    }
                }
                $question_2 = $step_question[1]['question_detail'];
                echo "<h4>Case Study Step 2</h4>";
                echo "<label>The most important issue you think is shown in the following.</label>";
                if (isset($pre_user_answer_2)) {
                    echo "<br/>$pre_user_answer_2";
                }
                else {
                    echo"<p>no previous answer</p>";
                }
                echo"<br/>";
                echo"<br/>";
                echo"<br/>";
            }
            elseif($step_id == 4)
            {
                foreach ($user_answer as $pre_answer)
                {
                    if( $pre_answer['question_id'] == 4 and $pre_answer['step_id'] == 3)
                    {
                        $pre_user_answer_3 = $pre_answer['question_answer'];
                        break;
                    }
                }
                $question_3 = $step_question[6]['question_detail'];
                echo "<h4>Case Study Step 3</h4>";
                echo "<label>The following is the answer of your case study step 3.<br/>$question_3</label>";
                if (isset($pre_user_answer_3)) {
                    echo "<br/>$pre_user_answer_3";
                }
                else {
                    echo"<p>no previous answer</p>";
                }
                echo"<br/>";
                echo"<br/>";
                echo"<br/>";
            }
            elseif($step_id == 5)
            {
                $counter = 1;
                foreach ($step_question as $pre_question)
                {
                    if($counter == $pre_question['step_id'])
                    {
                        $pre_step_id = $pre_question['step_id'];
                        echo "<h4>Case Study Step $pre_step_id</h4>";
                        $counter++;
                    }
                    foreach ($user_answer as $pre_answer)
                    {
                        if($pre_answer['step_id'] == $pre_step_id)
                        {
                            if ($pre_question['step_id'] == $pre_step_id and $pre_question['question_id'] == $pre_answer['question_id'] )
                            {
                                $previous_ques = $pre_question['question_detail'];
                                echo "<label>$previous_ques</label>";
                                $pre_user_answer = $pre_answer['question_answer'];
                                if (isset($pre_user_answer)) {
                                    echo "<p>$pre_user_answer</p>";
                                }
                                else {
                                    echo"<p>no previous answer</p>";
                                }
                                unset($pre_user_answer);
                            }

                        }

                    }
                    if($counter == 5)
                    {
                        break;
                    }
                }


            }

            elseif($step_id == 7)
            {
                $counter = 1;
                foreach ($step_question as $pre_question)
                {
                    if($counter == $pre_question['step_id'])
                    {
                        $pre_step_id = $pre_question['step_id'];
                        echo "<h4>Case Study Step $pre_step_id</h4>";
                        $counter++;
                    }
                    foreach ($user_answer as $pre_answer)
                    {
                        if( $pre_answer['step_id'] == $pre_step_id)
                        {
                            if ($pre_question['step_id'] == $pre_step_id and $pre_question['question_id'] == $pre_answer['question_id'] )
                            {
                                $previous_ques = $pre_question['question_detail'];
                                echo "<label>$previous_ques</label>";
                                $pre_user_answer = $pre_answer['question_answer'];
                                if (isset($pre_user_answer)) {
                                    echo "<p>$pre_user_answer</p>";
                                }
                                else {
                                    echo"<p>no previous answer</p>";
                                }
                                unset($pre_user_answer);
                            }

                        }

                    }
                    if($counter == 7)
                    {
                        break;
                    }
                }


            }
            elseif($step_id == 8)
            {
                foreach ($user_answer as $pre_answer)
                {
                    if( $pre_answer['question_id'] == 1 and $pre_answer['step_id'] == 2)
                    {
                        $pre_user_answer_2 = $pre_answer['question_answer'];
                        break;
                    }
                }
                $question_2 = $step_question[1]['question_detail'];
                echo "<h4>Case Study Step 2</h4>";
                echo "<label>The most important issue you think is shown following</label>";
                if (isset($pre_user_answer_2)) {
                    echo "<br/>$pre_user_answer_2";
                }
                else {
                    echo"<p>no previous answer</p>";
                }
                echo"<br/>";
                echo"<br/>";
                echo"<br/>";
            }elseif($step_id == 10)
            {
                foreach ($user_answer as $pre_answer)
                {
                    if( $pre_answer['question_id'] == 1 and $pre_answer['step_id'] == 2)
                    {
                        $pre_user_answer_2 = $pre_answer['question_answer'];
                        break;
                    }
                }
                $question_2 = $step_question[1]['question_detail'];
                echo "<h4>Case Study Step 2</h4>";
                echo "<label>The most important issue you think is shown following</label>";
                if (isset($pre_user_answer_2)) {
                    echo "<br/>$pre_user_answer_2";
                }
                else {
                    echo"<p>no previous answer</p>";
                }
                echo"<br/>";
                echo"<br/>";
                echo"<br/>";
            }
            //echo "<iframe id=\"id_iframe\" name=\"nm_iframe\" style=\"display:none;\"></iframe>";

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

                    $step_next = $step_id+1;

                    $link_next = url("casestudy/$id/step/$step_next");


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
@endsection
@section('script')
@parent
        <script type="text/javascript">
        function CheckIP(){
            for (var i=0;i<=4;i++){
    var check = document.getElementsByName("question_answer[]")[i].value;
if (check==""){
alert("You must answer ALL questions!");
return false;
}
}
}
</script>
@endsection
