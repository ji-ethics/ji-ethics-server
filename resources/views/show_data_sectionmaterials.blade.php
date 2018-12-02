<!DOCTYPE html><html lang="en">
<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{ asset('\css\bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\bootstrap-theme.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>

</head>

<body>

<div class="padding">
<?php
    echo"<div><h1>Check the content of Chapter $id</h1></div>";
?>

    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">


<?php

        echo"<h2>Section Table</h2>";
        echo"<table class=\"table table-hover\">";
        echo"<tr>";
        echo"<th>Section id</th><th>Section title</th><th>Link to Modify</th><th>Link to Delete</th>";
        echo"</tr>";


        $sections = json_decode($sections,true);

        foreach($sections as $sec_value)
        {

                    echo"<tr>";
                    $chapter_id = $sec_value['chapter_id'];
                    $section_id = $sec_value['rank'];
                    $section_title = $sec_value['title'];
                    $section_counter = $sec_value['section_id'];

                    echo"<th>$section_id</th>";
                    echo"<th>$section_title</th>";
                    $link_sec = url("/modify/chapter/$chapter_id/section/$section_id");
                    echo"<th><a class=\"btn btn-default\" href= $link_sec>modify</a></th>";
                    $link_delete = url("/delete/chapter/$id/section/$section_counter");
                    echo"<th><a href=$link_delete onclick = \"return confirm('Do you wanna delete the data?');\" class=\"btn btn-default\" >delete</a></th>";
                    echo"</tr>";

        }
        echo"</table>";
            $link_add_sec = url("/addnewsection/chapter/$id");

            echo"<a class=\"btn btn-default\" href= $link_add_sec>Add a new section</a>";
            echo"<br/>";
            echo"<br/>";
            echo"<br/>";

            echo"<h2>Section Question Table</h2>";
            echo"<table class=\"table table-hover\">";
            echo"<tr>";
            echo"<th>Section id</th><th>Question id</th><th>Question title</th><th>Link to delete</th>";
            echo"</tr>";


            $section_question = json_decode($section_question,true);

            foreach($section_question as $sec_que)
            {
                echo"<tr>";
                $chapter_id = $sec_que['chapter_id'];
                $section_id = $sec_que['section_rank'];
                $question_id = $sec_que['question_id'];
                $question = $sec_que['question'];


                echo"<th>$section_id</th>";
                echo"<th>$question_id</th>";
                echo"<th>$question</th>";

                $link_delete = url("/delete/section/$chapter_id/$section_id/question/$question_id");
                echo"<th><a href=$link_delete onclick = \"return confirm('Do you wanna delete the data?');\" class=\"btn btn-default\" >delete</a></th>";
                echo"</tr>";
            }
            echo"</table>";

            $link_add_sec_que = url("/addnewsection_que/chapter/$id");

            echo"<a class=\"btn btn-default\" href= $link_add_sec_que>Add a new question</a>";
            echo"<br/>";
            echo"<br/>";
            echo"<br/>";
            echo"<div class = \"text-center\">";

            $link_back = url("/showstudymaterial");
            echo"<a class=\"btn btn-default\" href= $link_back>Back</a>";
            echo"</div>";
            echo"<br/>";
            echo"<br/>";
            echo"<br/>";
?>


        </div>

    </div>


    <div class="col-xs-1 col-sm-2 col-md-2"></div>
</div>
</div>
</body>

</html>