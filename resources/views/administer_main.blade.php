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

    <div><h1>Administer Page</h1></div>


    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="thumbnail">
                <div>
                    <h3>Study material</h3>
                    <p>Adjusting the study material </p>
                    <?php
                    $tmp1 = url("/admin/material");
                    echo "<p><a href = $tmp1  class=\"btn btn-primary\" role=\"button\">Material Management</a></p>"

                    ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="thumbnail">


                    <h3>User</h3>

                    <p>Manage the user</p>
                <?php
                    $tmp2 = url("/admin/user");
                    echo "<p><a href = $tmp2  class=\"btn btn-primary\" role=\"button\">User Management</a></p>"

                ?>
            </div>
        </div>
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
    </div>

    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="thumbnail">
                <div>
                    <h3>Survey Management</h3>
                    <p>Adjusting the Survey question</p>
                    <?php
                    $tmp3 = url("/admin/data");
                    echo "<p><a href = $tmp3  class=\"btn btn-primary\" role=\"button\">Check</a></p>"

                    ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="thumbnail">


                <h3>Data Analysis</h3>

                <p>Data Analysis Check</p>
                <?php
                $tmp4= url("/admin/data");
                echo "<p><a href = $tmp4  class=\"btn btn-primary\" role=\"button\">Data Analysis Result</a></p>"

                ?>
            </div>
        </div>
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
    </div>
</div>
</body>

</html>