<!DOCTYPE html><html lang="en">
<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>

        body{

            margin-left:auto;

            margin-right:auto;

            margin-TOP:80px;

            width:60em;

        }

    </style>
</head>

<body>






<?php

echo"<font size=\"5\">";
echo"<p>You have already finished the survey and your response will be used for further research. Thank you for your participation!</p>";

echo"<br/>";
$Link_homepage = url('/homepage');
echo"<div class = 'text-center'>";
echo"<a href = $Link_homepage><button type=\"button\"  class=\"btn btn-default\">Go to homepage</button></a>";
echo"</div>";
echo"</font>";
?>

</body>

</html>