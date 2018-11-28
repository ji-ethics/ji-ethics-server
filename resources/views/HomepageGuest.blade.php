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
@include('Header1')


<div class="jumbotron">
    <div class="container">
        <h1>Welcome</h1>
        <p>This is a study webpage for you to learn and test engineering ethics. As a guest, you cannot get enough information. Please Log in first.</p>

        <?php
        $link_survey = url('/Login');
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
@include('Footer')
</body>

</html>