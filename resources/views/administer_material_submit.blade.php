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

    <div><h1>Material</h1></div>


    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">

            <form action="/material_edit" method="POST">
                {{csrf_field()}}

                <?php
                $sections1 = json_decode($sections, true);
//                $sections_title = json_decode($sections_title, true);
//                $chapters1 = json_decode($chapters, true);

                //var_dump($sections[0]["chapter_id"]);

                $control=0;
                foreach ($sections1 as $ch_value)
                {
                    if($control==0){
                        $id=$ch_value["chapter_id"];
                        echo "<div class=\"form-group\">";
                        echo"<label>Chapter id</label>";
                        echo"<textarea name=\"chapter_id\" type=\"text\" class=\"form-control\">$id</textarea>";
                        echo"</div>";
                        $control=1;
                    }
                    $section_detail = $ch_value["detail"];
                    $section_rank = $ch_value["rank"];
                    $section_title = $ch_value["title"];


                    echo "<div class=\"form-group\" id=\"section$section_rank \">";
                        echo"<label>section id</label>";
                        echo"<textarea name=\"section\" type=\"text\" class=\"form-control\">$section_rank</textarea>";
                    echo"</div>";
                    echo "<div class=\"form-group\">";
                        echo"<label>section title</label>";
                        echo"<textarea name=\"sectiontitle\" type=\"text\" class=\"form-control\" >$section_title</textarea>";
                    echo"</div>";
                    echo "<div class=\"form-group\">";
                        echo"<label>section detail</label>";
                        echo"<textarea name=\"sectiondetail\"  id=\"content\" style=\"height:400px;max-height:500px;\" type=\"text\" class=\"form-control\" placeholder=\"section_detail\">";
                        echo htmlspecialchars($section_detail);
                        echo"</textarea>";
                        echo"</div>";
                    echo"<br/>";
                    echo"<br/>";
                    echo"<br/>";


                }
                echo"<button type=\"submit\" class=\"btn btn-default\">Edit</button>";
                ?>

            </form>
            <br>
        </div>

        </div>

        </div>


        <div class="col-xs-1 col-sm-2 col-md-2"></div>

</body>

</html>