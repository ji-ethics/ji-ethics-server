<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Surveys for users</title>
    <link rel="stylesheet" href="{{ asset('\css\bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('\css\mycss.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>

@include('Header')


<div class = "row">
    <div class="col-md-2"></div>



    <div class="col-md-8">

        <h1>Survey</h1>
        <br/>
        <br/>
        <?php
        $question = json_decode($survey_questions,true);
        foreach ($question as $content) {
                if($content['id'] == $id)
                    {
                    $question_title = $content['title'];
                    $question_ch_0 = $content['choice0'];
                    $question_ch_1 = $content['choice1'];
                    $question_ch_2 = $content['choice2'];
                    $question_ch_3 = $content['choice3'];
                    $question_ch_4 = $content['choice4'];
                    $question_ch_5 = $content['choice5'];
                    echo "<form>";
                    //echo "<div padding class = \"text-center\">";
                    echo "<p>Instructions: $question_title</p>";
                    echo "<div>";
                    echo "<br/>";
                    echo "<p>[0]$question_ch_0</p>";
                    echo "<p>[1]$question_ch_1</p>";
                    echo "<p>[2]$question_ch_2</p>";
                    echo "<p>[3]$question_ch_3</p>";
                    echo "<p>[4]$question_ch_4</p>";
                    echo "<p>[5]$question_ch_5</p>";
                    echo "<br/>";
                    //echo "</div>";
                    echo "</div>";
                    echo "</form>";

                $question_details = json_decode($survey_details,true);
                foreach ($question_details as $survey_details) {

                    echo "<div>";
                    $details = $survey_details['detail'];

                    echo "<select class=\"form-control:focus\">";
                        for ($x=0; $x<=5; $x++) {
                            echo "<option>[$x]</option>";
                        }
                        echo "</select>";
                    echo "<label>  $details</label>";
                    echo "</div>";
                    echo "<br/>";
                    }
                }
            }
        echo "<div padding class = \"text-center\">";
        echo "<a href=\"#\"><button type=\"submit\" class=\"btn btn-default\">Submit</button></a>";
        $new_id = 0;
        foreach ($question as $content1) {
            if($content1['id'] == $id+1)
                {
                    $new_id = $id+1;
                    $link_next = url("/surveys/$new_id");
                }
        }
        if ($new_id == 0)
            {
                $link_next = url("/senarios");
            }
        echo "<a href=$link_next><button class=\"btn btn-default\">Next</button></a>";
        echo "</div>";
        ?>





        <br/>
        <p></p>
    </div>

    <div class="col-md-2"></div>
</div>

@include('Footer')

</body>


</html>
