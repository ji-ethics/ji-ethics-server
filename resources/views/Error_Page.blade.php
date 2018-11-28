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

    <div class="text-center"><h1>Error Page</h1></div>

    <br/>
    <br/>
    <?php
    echo"<div><h2>Error Data: $errordata</h2></div>";

    echo"<div><a class=\"btn btn-default\" href=\"$return_url\" role=\"button\"> Return </a></div>"

    ?>
</div>


</body>

</html><?php
