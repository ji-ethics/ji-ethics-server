<!DOCTYPE html><html lang="en">
<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
</head>

<body>

<div class="padding">

    <div><h1>Study material</h1></div>


    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">

<?php
        echo"<h2>Chapter Table</h2>";
        echo"<br/>";
        echo"<table class=\"table table-hover\">";
        echo"<tr>";
        echo"<th>Chapter id</th><th>Chapter title</th><th>Link to Check</th><th>Link to Modify</th><th>Link to Delete</th>";
        echo"</tr>";
        $chapter = json_decode($chapter,true);
        foreach($chapter as $ch_value)
            {
                echo"<tr>";
                $chapter_id = $ch_value['id'];
                $chapter_title = $ch_value['title'];
                echo"<th>$chapter_id</th>";
                echo"<th>$chapter_title</th>";
                $link_sec = url("/modify/chapter/$chapter_id");
                $link_sec_check = url("/check/chapter/$chapter_id");
                echo"<th><a class=\"btn btn-default\" href= $link_sec_check>check</a></th>";
                echo"<th><a class=\"btn btn-default\" href= $link_sec>Change it</a></th>";
                $link_delete = url("/delete/chapter/$chapter_id");
                echo"<th><a href=$link_delete onclick = \"return confirm('Do you wanna delete the data?');\" class=\"btn btn-default\" >delete</a></th>";
                echo"</tr>";
            }

        echo"</table>";






?>
    <form action="/chapter_add" method="POST">

    {{ csrf_field() }}
    <?php

    echo "<h3>Add a new chapter</h3>";
    echo "<label>Chapter ID</label>";
    echo "<div class=\"form-group\">";
    echo"<textarea name=\"id\"  id=\"content\" class=\"form-control\" placeholder=\"Input new chapter id in the box (only a number please).\">";

    echo"</textarea>";
    echo "</div>";

    echo "<label>Chapter Title</label>";
    echo "<div class=\"form-group\">";
    echo "<textarea name=\"title\"  id=\"content\"  style=\"height:60px\" class=\"form-control\" placeholder=\"Input new chapter title in the box\">";

    echo "</textarea>";
    echo "</div>";


    echo"<button type=\"submit\" class=\"btn btn-default\" >submit</button>";
    echo "<br/>";
    echo "<br/>";
    ?>
    </form>
    <?php echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";


    echo "<h2>Case table</h2>";
    $case_study = json_decode($case_study,true);
    echo "<br/>";
    echo"<table class=\"table table-hover\">";
    echo"<tr>";
    echo"<th>Case id</th><th>Case title</th><th>Link to Modify</th><th>Link to Delete</th>";
    echo"</tr>";
    foreach($case_study as $case_value)
    {
        echo"<tr>";
        $case_id = $case_value['id'];
        $case_title = $case_value['title'];
        echo"<th>$case_id</th>";
        echo"<th>$case_title</th>";
        $link_modify = url("/modify/case/$case_id");
        echo"<th><a class=\"btn btn-default\" href= $link_modify>Change it</a></th>";
        $link_delete = url("/delete/case/$case_id");
        echo"<th><a href=$link_delete onclick = \"return confirm('Do you wanna delete the data?');\" class=\"btn btn-default\" >delete</a></th>";
        echo"</tr>";
    }
    $case_id++;
    echo"</table>";
    $link_add_case = url("/addnewcase/$case_id");

    echo"<a class=\"btn btn-default\" href= $link_add_case>Add a new case</a>";
    echo"<br/>";
    echo"<br/>";
    echo"<br/>";
    echo"<div class = \"text-center\">";
    echo"<br/>";
    echo"<br/>";
    echo"<br/>";



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