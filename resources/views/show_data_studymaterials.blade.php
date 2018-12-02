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

    <div><h1>Study material</h1></div>


    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">

<?php
        echo"<h2>Chapter Table</h2>";
        echo"<br/>";
        echo"<table class=\"table table-hover\">";
        echo"<tr>";
        echo"<th>Chapter id</th><th>Chapter title</th><th>Link to Check</th><th>Link to Modify</th>";
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
                echo"<th><a class=\"btn btn-default\" href= $link_sec>Change the title</a></th>";
                echo"</tr>";
            }

        echo"</table>";

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