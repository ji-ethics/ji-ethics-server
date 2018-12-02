<!DOCTYPE html><html lang="en">
<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Homepage</title>
</head>

<body>
@include('Header')

@guest
    <div class="jumbotron">
        <div class="container">
            <h1>Welcome</h1>
            <p>This is a study webpage for you to learn and test engineering ethics. As a guest, you cannot get enough information. Please Log in first.</p>

            <?php
            $link_survey = url('/login');
            echo"<p><a class=\"btn btn-primary btn-lg\" href=$link_survey role=\"button\">Log in</a></p>";
            ?>

        </div>
    </div>

    <div class="row">

        <div class="col-xs-1 col-sm-2 col-md-2"></div>


    </div>
    <?php
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    ?>

@else
    <div class="jumbotron">
        <div class="container">
            <h1>Welcome</h1>
            <p>This is a study webpage for you to learn and test engineering ethics. You can first do the following survey to have a primary impression.</p>

            <?php
            $link_survey = url('/surveys/1');
            echo"<p><a class=\"btn btn-primary btn-lg\" href=$link_survey role=\"button\">Start The Survey</a></p>";
            ?>

        </div>
    </div>

    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="thumbnail">
                <img src="{{ asset('image\200_200.jpg') }}" height="200" width="200" alt="img-thumbnail"/>
                <div class="caption">
                    <div class="text-center">
                        <h3>News</h3>
                        <p>The recent new about VG496</p>
                        <p><a class="btn btn-primary" role="button">Learn More</a> </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="thumbnail">
                <img src="{{ asset('image\200_200.jpg') }}" height="200" width="200" alt="img-thumbnail"/>
                <?php
                echo"<div class=\"caption\">";

                echo"<div class=\"text-center\">";

                echo"<h3>Study</h3>";



                echo"<p>You could learn more knowledge of ethics in this part</p>";

                $link_gostudy = url('chapter/1/section/1');

                echo"<p><a href=$link_gostudy class=\"btn btn-primary\" role=\"button\">Go Study</a> </p>";

                echo"</div>";
                echo"</div>";
                ?>
            </div>
        </div>
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
    </div>
@endguest
@include('Footer')
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>