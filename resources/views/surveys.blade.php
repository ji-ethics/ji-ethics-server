@extends('layouts.app')
@section('content')

<div class = "row">
    <div class="col-md-2"></div>



    <div class="col-md-8">
    <?php
        echo"<h1>Survey $id</h1>";
        ?>
        <br/>
        <br/>
        <?php
        $question = json_decode($survey_questions,true);

        foreach ($question as $content) {
                if($content['id'] == $id)
                    {
                    $question_title = $content['title'];
                    $question_ch_0 = $content['choice0'];
                    $question_ch_1 = $content['choice1'];
                    $question_ch_2 = $content['choice2'];
                    $question_ch_3 = $content['choice3'];
                    $question_ch_4 = $content['choice4'];
                    $question_ch_5 = $content['choice5'];
                    echo "<form>";
                    //echo "<div padding class = \"text-center\">";

                    //echo "<div class=\"thumbnail fixed-top\">";
                    echo "<br/>";
                    echo "<p>Instructions: $question_title</p>";

                    echo "<div>";

                    echo "<br/>";
                    echo "<p>[0]$question_ch_0</p>";
                    echo "<p>[1]$question_ch_1</p>";
                    echo "<p>[2]$question_ch_2</p>";
                    echo "<p>[3]$question_ch_3</p>";
                    echo "<p>[4]$question_ch_4</p>";
                    echo "<p>[5]$question_ch_5</p>";
                    //echo "</div>";

                    //echo "</div>";
                    echo "</div>";
                    echo "</form>";
                        echo "<br/>";
                        echo "<br/>";
                        echo "<br/>";
                $question_details = json_decode($survey_details,true);
                ?>
        <form action="/surveyanswer_input" method="POST" onsubmit=" return checkIP()">
            {{ csrf_field()}}
            <?php
                $user_id = 1;
                $counter = 0;
                echo"<table class=\"table table-hover\">";
                echo"<tr>";
                echo"<th>0</th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th>";
                echo "<th><div class=\"radio-inline\"  style=\"display:none;\">";
                echo "<label>";
                echo "<input type=\"radio\" name=\"aaa\" value=6 checked>";
                echo 6;
                echo "</label>";
                echo "</div></th>";
                echo "<th><label>The question detail</label></th>";
                echo"</tr>";
                foreach ($question_details as $survey_details) {


                    //echo "<li>";
                    $details = $survey_details['detail'];
                    //echo"<div class=\"col-md-1\"></div>";




                        echo "<div>";
                        echo"<tr>";
                        for ($x=0; $x<=5; $x++) {
                            echo "<th><div class=\"radio-inline\">";
                            echo "<label>";
                            echo "<input type=\"radio\" name=\"answer[$counter]\" id = \"answer[$counter]\" value=$x checked>";
                            echo "</label>";
                            echo "</div></th>";
                        }

                        echo "<th><div class=\"radio-inline\"  style=\"display:none;\">";
                        echo "<label>";
                        echo "<input type=\"radio\" name=\"answer[$counter]\" id = \"answer[$counter]\" value=6 checked>";

                        echo "</label>";



                        echo "<div class=\"form-group\" style=\"display:none;\">";
                        echo"<textarea name=\"survey_id\"   style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                        echo $id;
                        echo"</textarea>";
                        echo "</div>";

                        echo "<div class=\"form-group\" style=\"display:none;\">";
                        echo"<textarea name=\"id[$counter]\"   style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                        echo $survey_details['id'];
                        echo"</textarea>";
                        echo "</div>";

                        echo "</div></th>";
                        echo "<th><label>  $details</label></th>";
                        //echo "</li>";
                        echo "</div>";
                        echo"<tr>";
                    $counter++;
                }
                echo"</table>";
                }
            }
            echo "<div class=\"form-group\" style=\"display:none;\">";
            echo"<textarea name=\"survey_length\"  id=\"length\" style=\"height:80px;max-height:500px;\" class=\"form-control\">";
            echo $counter;
            echo"</textarea>";
            echo "</div>";

        echo "<div class = \"text-center\">";
        echo "<a ><button type = \"submit\" class=\"btn btn-default\">Submit</button></a>";





        ?>
        </form>

        {{--MyJavaScript--}}
        {{----}}
        <script type="text/javascript">
            function checkIP(){//js表单验证方法
                var length=document.getElementById("length").value;//通过id获取需要验证的表单元素的值
                for(var i=0;i<length;i++)
                {
                    var check = document.getElementsByName("answer"+"["+i+"]")[6];
                        if (check.checked) {
                                alert("Please answer every survey question");//弹出提示
                                return false;
                        }
                }
                alert("You have already finished this survey. Click yes to leave.");//弹出提示
                return true;
            }
        </script>
        {{----}}
        {{--MyJavaScript--}}

        <br/>
        <p></p>
    </div>

    <div class="col-md-2"></div>


@include('Footer')
</div>

@endsection
