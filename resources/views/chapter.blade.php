<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Study Page</title>
    <link rel="stylesheet" href="{{ asset('\css\bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\bootstrap-theme.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

@include('Header')

<div class = "row">
    <div class="col-md-2"></div>
    <div class="col-md-2">

        <div class="thumbnail fixed-top">
            <div id = "navsecond">

                <h2>Chapters</h2>
                <ul>
                    <?php
                        $sections1 = json_decode($sections, true);
                        $sections_title = json_decode($sections_title, true);
                        $chapters = json_decode($chapters, true);
                        //var_dump($sections[0]["chapter_id"]);
                    echo "<li>";
                        foreach ($chapters as $ch_value)
                            {
                                $chapter_id = $ch_value["id"];
                                $title = $ch_value["title"];
                                echo "<li><a href = \"#\">Chapter .$chapter_id./..$title</a></li>";
                                echo "<li>";
                                foreach ($sections_title as $se_value)
                                {
                                    if ($chapter_id == $sections1[0]["chapter_id"]){
                                        $section_rank = $se_value["rank"];
                                        $section_title = $se_value["title"];
                                        if ($se_value["rank"] == $sections1[0]["rank"]){
                                            echo "<li><mark><a href = \"#\">Section .$section_rank./..$section_title</a></mark></li>";
                                        }
                                        else{
                                            echo "<li><a href = \"{{URL(\'chapter/1/section/2\')}}\">Section .$section_rank./..$section_title</a></li>";
                                        }
                                    }
                                }
                                echo "</li>";
                            }
                    echo "</li>";
                    ?>
                        <!--foreach ($data as $key => $value)
                        {
                            $section_id = $value["rank"];
                            $title = $value["title"];
                            echo "<li><a href = \"#\">Chapter .$section_id./..$title</a></li>";
                        }-->

                </ul>


            </div>
        </div>

    </div>
    <div class="col-md-6">
        <?php
        $sections2 = json_decode($sections, true);

        //print
        echo "<h1>Chapter1. Introduction: Engineering Ethics from a Global Perspective</h1>";

        foreach ($sections2 as $se_value)
            {
                    $detail = $se_value["detail"];
                    $title = $se_value["title"];
                    echo "<h2>$title</h2>";
                    echo "<p>$detail</p>";
            }
        ?>
            <div padding class = "text-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">back</span>
                            </a>

                            <a href="StudyPage2.php" aria-label="Next">
                                <span aria-hidden="true">next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <br>
                <br>
                <br>
                <br>
                <br>

            </div>
    </div>
</div>

@include('Footer')

</body>
</html>

