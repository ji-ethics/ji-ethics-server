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
        echo"<div><h1>Change the Title of Chapter $id</h1></div>"
    ?>

    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">
            <form action="/chaptertitle_edit" method="POST" target="nm_iframe">

                {{ csrf_field() }}
                <?php
                $chapters = json_decode($chapters,true);
                foreach ($chapters as $chap_details)
                {
                    $chapter_id = $id;
                    $pre_chapter_title = $chap_details['title'];
                    echo "<br/>";
                    echo "<br/>";
                    echo "<h4>Chapter Title</h4>";
                    echo "<div class=\"form-group\">";
                    echo "<textarea name=\"title\"  id=\"content\"  style=\"height:60px\" class=\"form-control\" placeholder=\"Please input a new chapter title in the box\">";
                    echo "$pre_chapter_title";
                    echo "</textarea>";
                    echo "</div>";

                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"id\"  id=\"content\" style=\"height:80px;max-height:500px;\" class=\"form-control\">";
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
                $link_back = url("/showstudymaterial");
                echo"<a class=\"btn btn-default\" href= $link_back>Back to Material Page</a>";
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