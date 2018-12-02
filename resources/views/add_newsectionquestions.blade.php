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
        echo"<div><h1>Add a New Section question for Chapter $id</h1></div>"
    ?>

    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">
            <form action="/sectionquestion_add" method="POST" target="nm_iframe">

                {{ csrf_field() }}
                <?php
                echo "<br/>";
                echo "<br/>";
                echo "<label>Section ID</label>";
                echo "<div class=\"form-group\">";
                echo"<textarea name=\"section_id\"  id=\"content\" class=\"form-control\" placeholder=\"Input section id in the box (only a number please).\">";

                echo"</textarea>";
                echo "</div>";


                echo "<label>Question ID</label>";
                echo "<div class=\"form-group\">";
                echo "<textarea name=\"question_id\"  id=\"content\" class=\"form-control\"  placeholder=\"Input question id in the box (only a number please).\">";

                echo "</textarea>";
                echo "</div>";

                echo "<label>Question details</label>";
                echo "<div class=\"form-group\">";
                echo "<textarea name=\"question_detail\"  id=\"content\" class=\"form-control\"  placeholder=\"Input question title in the box\">";

                echo "</textarea>";
                echo "</div>";

                echo "<div class=\"form-group\" style=\"display:none;\">";
                echo"<textarea name=\"chapter_id\"  id=\"content\" style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                echo $id;
                echo"</textarea>";
                echo "</div>";









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
</div>
</body>

</html>