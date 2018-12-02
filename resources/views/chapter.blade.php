<!DOCTYPE HTML>
<html lang = "en">
<head>

    <meta charset="UTF-8">
    <title>Study Page</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
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
                <ul id="main-nav" class="nav nav-tabs nav-stacked">
                    <?php
                        $sections1 = json_decode($sections, true);
                        $sections_title = json_decode($sections_title, true);
                        $chapters = json_decode($chapters, true);
                        $case_study = json_decode($case_study,true);
                        $user_id = 1;
                        //var_dump($sections[0]["chapter_id"]);

                    echo "<li>";
                        foreach ($chapters as $ch_value)
                            {
                                $chapter_id = $ch_value["id"];
                                $title = $ch_value["title"];
                                $link1 = url("/chapter/$chapter_id/section/1");

                                echo "<li><a href = $link1 class=\"glyphicon glyphicon-globe\">Chapter $chapter_id. <br>$title</a></li>";
                                echo "<li>";
                                echo "<ul>";
                                foreach ($sections_title as $se_value)
                                {
                                    if ($chapter_id == $sections1[0]["chapter_id"]){
                                        $sec_rank = $se_value["rank"];
                                        $section_title = $se_value["title"];
                                        if ($se_value["rank"] == $sections1[0]["rank"]){
                                            $link2 = url("/chapter/$chapter_id/section/$sec_rank");
                                            echo "<li><a href = $link2><mark>$section_title</mark></a></li>";
                                        }
                                        else{
                                            $link3 = url("/chapter/$chapter_id/section/$sec_rank");
                                            echo "<li><a href = $link3>$section_title</a></li>";
                                        }
                                    }
                                }
                                echo "</ul>";
                                echo "</li>";
                            }
                    foreach ($case_study as $ca_value)
                    {
                        $case_id = $ca_value["id"];
                        $ca_title = $ca_value["title"];
                        $link2 = url("casestudy/$case_id/step/1");

                        echo "<li><a href = $link2 class=\"glyphicon glyphicon-globe\">Case Study $case_id. <br>$ca_title</a></li>";
                    }

                    echo "</li>";//No li element in scope but a li end tag seen.

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
        $section_question = json_decode($section_question, true);
        //print

        foreach ($sections2 as $se_value)
        {
            $detail = $se_value["detail"];
            $title = $se_value["title"];
            echo "<h2>$title</h2>";
            echo "<p>$detail</p>";
            echo "<br/>";
        }
        ?>

        <form action="/sectionanswer_edit" method="POST" target="nm_iframe">

            {{ csrf_field() }}
        <?php
                $user_answer = json_decode($user_answer,true);
                $counter = 0;
                foreach ($section_question as $ques_value)
                {
                    $ques_id = $ques_value['question_id'];
                    $ques_detail = $ques_value['question'];
                    $counter++;
                    foreach ($user_answer as $pre_answer)
                    {
                        if($pre_answer['user_id'] == $user_id and $ques_id == $pre_answer['question_id'])
                            {
                                $pre_user_answer = $pre_answer['answer'];
                                break;
                            }
                    }

                    echo "<label>$ques_detail</label>";

                    echo "<div class=\"form-group\">";
                    echo "<textarea name=\"answer[]\"  id=\"content\" style=\"height:80px;max-height:500px;\" class=\"form-control\" placeholder=\"Please input your answer in the box\">";
                    if (isset($pre_user_answer)) {
                        echo "$pre_user_answer";
                    }
                    unset($pre_user_answer);
                    echo "</textarea>";
                    echo "</div>";


                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"question_id[]\"  id=\"content\" style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $ques_id;
                    echo"</textarea>";
                    echo "</div>";


                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"user_id[]\"  id=\"content\" style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $user_id;
                    echo"</textarea>";
                    echo "</div>";

                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"section_rank[]\"  id=\"content\" style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $section_rank;
                    echo"</textarea>";
                    echo "</div>";

                    echo "<div class=\"form-group\" style=\"display:none;\">";
                    echo"<textarea name=\"chapter_id[]\"  id=\"content\" style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                    echo $id;
                    echo"</textarea>";
                    echo "</div>";


                    }
                    if($counter !=0)
                    {
                            echo"<button type=\"submit\" class=\"btn btn-default\" >submit</button>";
                            echo "<br/>";
                            echo "<br/>";
                            echo "</form>";

                            echo "<iframe id=\"id_iframe\" name=\"nm_iframe\" style=\"display:none;\"></iframe>";
                    }

            ?>

            <div class = "text-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <?php
                            $sections3 = json_decode($sections, true);
                            $chapter_section = json_decode($chapter_section, true);

                            $sec_id = $sections3[0]['id']-1;
                            $chapter_now = $chapter_section[$sec_id]['chapter_id'];
                            $section_now = $chapter_section[$sec_id]['section_rank'];

                            $link_pre = url("/chapter/$chapter_now/section/$section_now");
                            $link_next = url("/chapter/$chapter_now/section/$section_now");

                            foreach ($chapter_section as $csvalue)
                            {
                                if ($csvalue['chapter_id'] == $chapter_now and $csvalue['section_rank'] == $section_now+1)
                                {
                                    $chapter_id = $csvalue['chapter_id']; $sec_rank = $csvalue['section_rank'];
                                    $link_next = url("/chapter/$chapter_id/section/$sec_rank");
                                    break;
                                }
                                elseif($csvalue['chapter_id'] == $chapter_now+1 and $csvalue['section_rank'] == 1)
                                {
                                    $chapter_id = $csvalue['chapter_id']; $sec_rank = $csvalue['section_rank'];
                                    $link_next = url("/chapter/$chapter_id/section/$sec_rank");
                                }
                            }
                            $temp =1;
                            foreach ($chapter_section as $csvalue)
                            {
                                if ($csvalue['chapter_id'] == $chapter_now and $csvalue['section_rank'] == $section_now-1)
                                {
                                    $chapter_id = $csvalue['chapter_id']; $sec_rank = $csvalue['section_rank'];
                                    $link_pre = url("/chapter/$chapter_id/section/$sec_rank");
                                    break;
                                }
                                elseif($csvalue['chapter_id'] == $chapter_now-1)
                                {
                                    if ($csvalue['section_id'] > $temp)
                                        {$temp = $csvalue['section_id'];}
                                    $chapter_id = $csvalue['chapter_id'];
                                    $link_pre = url("/chapter/$chapter_id/section/$temp");
                                }
                            }


                            echo"<a class=\"btn btn-default\" href= $link_pre>Previous</a>";

                            echo"<a class=\"btn btn-default\" href= $link_next>Next</a>";
                            ?>
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

