<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Study Page</title>
    <link rel="stylesheet" href="{{URL::asset('/bootstrap.css')}}">
</head>
<body>



<div class = "row">
    <div class="col-md-2"></div>
    <div class="col-md-2">

        <div class="thumbnail fixed-top">
            <div id = "navsecond">

                <h2>Chapters</h2>
                <ul>

                    <li><a href="#">Chapter 1</a></li>
                    <li><a href="#">Chapter 2</a></li>
                    <li><a href="#">Chapter 3</a></li>
                    <li><a href="#">Chapter 4</a></li>
                    <li><a href="#">Chapter 5</a></li>
                    <li><a href="#">Chapter 6</a></li>
                    <li><a href="#">Chapter 7</a></li>
                    <li><a href="#">Chapter 8</a></li>
                    <li><a href="#">Chapter 9</a></li>
                    <li><a href="#">Chapter 10</a></li>
                </ul>
                <h2>Appendix</h2>
                <ul>
                    <li><a href="#">Appendix I</a></li>
                    <li><a href="#">Appendix II</a></li>
                    <li><a href="#">Appendix III</a></li>
                </ul>

            </div>
        </div>

    </div>
    <div class="col-md-6">
        <?php
        $data = json_decode($sections, true);

        //print
        echo "<h1>Chapter1. Introduction: Engineering Ethics from a Global Perspective</h1>";

        foreach ($data as $key => $value)
        {
            $results = $value["title"];
            echo "<h4>$results</h4>";
            $details = $value["detail"];
            echo "<p>$details</p>";
        }
        ?>
        <div padding>
            <a href="PHP_Homepage.php"><button class="btn btn-default" type="submit" style="margin-right:150px">Return</button></a>
            <a href="Exercise.php"><button class="btn btn-default" type="submit" style="...">Exercise</button></a>
            <br>
            <br>
            <br>
            <br>
            <br>

        </div>
    </div>
</div>

</body>
</html>
