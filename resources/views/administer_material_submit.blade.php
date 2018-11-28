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

    <div><h1>Material</h1></div>


    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">

            <form action="/material_submit" method="POST">
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
                        echo"<input name=\"chapter_id\" type=\"text\" class=\"form-control\" placeholder=\"$id\">";
                        echo"</div>";
                        $control=1;
                    }
                    $section_detail = $ch_value["detail"];
                    $section_rank = $ch_value["rank"];
                    $section_title = $ch_value["title"];


                    echo "<div class=\"form-group\" id=\"section$section_rank \">";
                        echo"<label>section id</label>";
                        echo"<input name=\"section\" type=\"text\" class=\"form-control\" placeholder=\"$section_rank\">";
                    echo"</div>";
                    echo "<div class=\"form-group\">";
                        echo"<label>section title</label>";
                        echo"<input name=\"sectiontitle\" type=\"text\" class=\"form-control\" placeholder=\"$section_title\">";
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
                echo"<button type=\"submit\" class=\"btn btn-default\">Submit</button>";
                ?>
                {{--<div class="form-group">--}}
                    {{--<label>Chatper_id</label>--}}
                    {{--<input name="title" type="text" class="form-control" placeholder="这里是标题">--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label>内容</label>--}}
                    {{--<textarea id="content" style="height:400px;max-height:500px;" name="content" class="form-control" placeholder="这里是内容"></textarea>--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-default">提交</button>--}}
            </form>
            <br>
        </div>

        </div>

        </div>


        <div class="col-xs-1 col-sm-2 col-md-2"></div>
    </div>
</div>
</body>

</html>