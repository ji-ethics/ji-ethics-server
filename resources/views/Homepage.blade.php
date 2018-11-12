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
@include('Header')


<div class="jumbotron">
    <div class="container">
        <h1>Welcome</h1>
        <p>This test will help you to learn your ethical view</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Start Testing</a></p>
    </div>
</div>

<div class="row">
    <div class="col-xs-1 col-sm-2 col-md-2"></div>
    <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="thumbnail">
            <img src="{{ asset('image\200_200.jpg') }}" height="200" width="200" alt="img-thumbnail"/>
            <div class="caption">
                <h3>News</h3>
                <p>The recent new about VG496</p>
                <p><a href="#" class="btn btn-primary" role="button">Learn More</a> </p>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="thumbnail">
            <img src="{{ asset('image\200_200.jpg') }}" height="200" width="200" alt="img-thumbnail"/>
            <div class="caption">
                <h3>Study</h3>
<!--                <?php
//                    // read the study progress
//                    $json_string = file_get_contents('database/studyprogress.json');
//                    $data = json_decode($json_string,true);
//                    foreach ($data["study_progress"] as $key => $value) {
//                        $chapter =  $value["chapter_id"];
//                        echo "<p>You are going to study chapter $chapter</p>";
//                    }
//                ?>
                    -->

                <p><a href="#" class="btn btn-primary" role="button">Go Study</a> </p>
            </div>
        </div>
    </div>
    <div class="col-xs-1 col-sm-2 col-md-2"></div>
</div>
@include('Footer')
</body>

</html>