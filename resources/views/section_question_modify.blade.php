@extends('admin.Header')
@section('content')
<div class="padding">

    <?php
        echo"<div><h1>Modify Chapter $id Section $section_id Question $question_rank</h1></div>"
    ?>

    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">
            <form action="/sectionquestion_edit" method="POST" target="nm_iframe">

                {{ csrf_field() }}
                <?php
                    echo"<br/>";
                echo"<br/>";
                echo"<br/>";
                echo"<br/>";
                $section_question = json_decode($section_question,true);
                foreach ($section_question as $sec_details)
                {
                    $chapter_id = $id;
                    $sec_id = $section_id;

                    $question_id = $sec_details['question_id'];

                    $question_detail = $sec_details['question'];

                    echo "<h3>Section Question Details</h3>";
                    echo "<div class=\"form-group\">";
                    echo "<textarea name=\"title\"    style=\"height:60px\" class=\"form-control\" placeholder=\"Please input your answer in the box\">";
                    echo "$question_detail";
                    echo "</textarea>";
                    echo "</div>";

                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"question_id\"  style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $question_id;
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
                    $link_back = url("/check/chapter/$id");
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