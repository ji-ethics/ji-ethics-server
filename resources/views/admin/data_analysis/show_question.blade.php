@extends('admin.Header')

@section('content')

<div class="padding">

    <div><h1>All Questions</h1></div>


    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">

            <?php
            echo"<h2>Survey Question</h2>";
            echo"<br/>";
            echo"<table class=\"table table-hover\">";
            echo"<tr>";
            echo"<th>Question id</th><th>Question Detail</th><th>Data Analysis</th><th>Result</th>";
            echo"</tr>";
            $chapter = json_decode($survey,true);
            $survey_typeid = 3;
            foreach($chapter as $ch_value)
            {
                echo"<tr>";
                $questionid = $ch_value['id'];
                $questiondetail = $ch_value['detail'];
                echo"<th>$questionid</th>";
                echo"<th>$questiondetail</th>";
                $link_sec = url("/dataanalysis/survey/$questionid");
                echo"<th><a class=\"btn btn-default\" href= $link_sec>check</a></th>";
                if (in_array($questionid, $survey_hasresult)){
                    $result_url = url("/dataanalysis/result/$survey_typeid/$questionid");
                    echo "<th><a class=\"btn btn-default\" href= $result_url>result</a></th>";
                } else {
                    echo "<th>No result</th>";
                }
                echo"</tr>";
            }

            echo"</table>";

            ?>

            <br/>
            <br/>
            <br/>

            <?php
            echo"<h2>Case Study Question</h2>";
            echo"<br/>";
            echo"<table class=\"table table-hover\">";
            echo"<tr>";
            echo"<th>Question id</th><th>Question Detail</th><th>Data Analysis</th><th>Result</th>";
            echo"</tr>";
            $chapter = json_decode($casestudy,true);
            $case_detail = json_decode($casematerial,true);
            $case_now = 1;
            $case_typeid = 1;


                foreach($chapter as $ch_value)
                {
                    if($ch_value['case_id'] == $case_now){
                        $tmp_title = $case_detail[$case_now -1]['title'];
                        echo"<tr>";
                        echo"<th>Case $case_now</th><th>$tmp_title</th><th></th><th></th>";
                        echo"</tr>";
                        $case_now++;
                    }
                    echo"<tr>";
                    $absolute_id = $ch_value['id'];
                    $questionid = $ch_value['question_id'];
                    $questiondetail = $ch_value['detail'];
                    echo"<th>$questionid</th>";
                    echo"<th>$questiondetail</th>";
                    $link_sec = url("/dataanalysis/casestudy/$absolute_id");
                    echo"<th><a class=\"btn btn-default\" href= $link_sec>check</a></th>";
                    if (in_array($absolute_id, $case_hasresult)){
                        $result_url = url("/dataanalysis/result/$case_typeid/$absolute_id");
                        echo "<th><a class=\"btn btn-default\" href= $result_url>result</a></th>";
                    } else {
                        echo "<th>No result</th>";
                    }
                    echo"</tr>";
                }

            echo"</table>";

            ?>

            <br/>
            <br/>
            <br/>

            <?php
            echo"<h2>Section Study Question</h2>";
            echo"<br/>";
            echo"<table class=\"table table-hover\">";
            echo"<tr>";
            echo"<th>Question id</th><th>Question Detail</th><th>Data Analysis</th><th>Result</th>";
            echo"</tr>";
            $chapter = json_decode($section,true);
            $section_typeid = 2;
            $i=0;
            foreach($chapter as $ch_value)
            {
                echo"<tr>";
                $i++;
                $questionid = $ch_value['id'];
                $questiondetail = $ch_value['detail'];
                echo"<th>$i</th>";
                echo"<th>$questiondetail</th>";
                $link_sec = url("/dataanalysis/sectionstudy/$questionid");
                echo"<th><a class=\"btn btn-default\" href= $link_sec>check</a></th>";
                if (in_array($questionid, $section_hasresult)){
                    $result_url = url("/dataanalysis/result/$survey_typeid/$questionid");
                    echo "<th><a class=\"btn btn-default\" href= $result_url>result</a></th>";
                } else {
                    echo "<th>No result</th>";
                }
                echo"</tr>";
            }

            echo"</table>";

            ?>

        </div>

    </div>


    <div class="col-xs-1 col-sm-2 col-md-2"></div>
</div>
@endsection