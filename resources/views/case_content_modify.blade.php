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
        echo"<div><h1>Change the Content of Case $id</h1></div>"
    ?>

    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">
            <form action="/casedetail_edit" method="POST" target="nm_iframe">

                {{ csrf_field() }}
                <?php
                $case = json_decode($case,true);
                foreach ($case as $case_details)
                {
                    $case_id = $id;

                    $pre_case_title = $case_details['title'];
                    $pre_case_detail = $case_details['details'];
                    $pre_case_ref = $case_details['reference'];

                    $pre_case_detail = str_replace("<br/>","\r\n",$pre_case_detail);
                    $pre_case_ref = str_replace("<br/>","\r\n",$pre_case_ref);

                    echo "<br/>";
                    echo "<br/>";
                    echo "<h4>Case Title</h4>";
                    echo "<div class=\"form-group\">";
                    echo "<textarea name=\"title\"  id=\"content\"  style=\"height:60px\" class=\"form-control\" placeholder=\"Please input a new case title in the box\">";
                    echo "$pre_case_title";
                    echo "</textarea>";
                    echo "</div>";
                    echo "<br/>";

                    echo "<h4>Chapter Details</h4>";
                    echo "<div class=\"form-group\">";
                    echo "<textarea name=\"detail\"  id=\"content\"  style=\"height:300px\" class=\"form-control\" placeholder=\"Please input the case details in the box\">";
                    echo "$pre_case_detail";
                    echo "</textarea>";
                    echo "<br/>";

                    echo "<h4>Chapter References</h4>";
                    echo "<div class=\"form-group\">";
                    echo "<textarea name=\"reference\"  id=\"content\"  style=\"height:300px\" class=\"form-control\" placeholder=\"Please input the references in the box\">";
                    echo "$pre_case_ref";
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