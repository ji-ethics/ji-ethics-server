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

            width:20em;

        }

    </style>
</head>

<body>




<h2>LOGIN</h2>

<?php

echo"<div class=\"input-group\">";

        echo"<span class=\"input-group-addon\" id=\"basic-addon1\">";

            $user_img = url(asset('image\User.png'));

            echo"<img src=$user_img height=\"15\" width=\"15\"/>";

        echo"</span>";

    echo"<input id=\"userName\" type=\"text\" class=\"form-control\" placeholder=\"E-mail Address\" aria-describedby=\"basic-addon1\">";

echo"</div>";

echo"<br/>";

echo"<div class=\"input-group\">";

        echo"<span class=\"input-group-addon\" id=\"basic-addon1\">";

        $password_img = url(asset('image\Password.png'));

        echo"<img src=$password_img height=\"15\" width=\"15\" />";

        echo"</span>";

    echo"<input id=\"passWord\" type=\"password\" class=\"form-control\" placeholder=\"Password\" aria-describedby=\"basic-addon1\">";

echo"</div>";

echo"<br/>";

echo"<div>";

$Link_homepage = url('/homepage');

echo"<a href = $Link_homepage><button type=\"button\" style=\"width:110px;\" class=\"btn btn-default\">Log In</button></a>";

$Link_register = url('/register');

echo"<a href = $Link_register><button type=\"button\" class=\"btn btn-link\">Create a new account</button></a>";

echo"</div>"

?>

</body>

</html>