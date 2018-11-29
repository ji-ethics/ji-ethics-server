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

    <div><h1>Material</h1></div>


    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">

            <input name="_tabken" value="{{csrf_token()}}" type="hidden">
            <form action="/list_chapter" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Chapter NO.</label>
                    <input name="title" type="text" class="form-control" placeholder="Chapter ID">
                </div>
                <div class="form-group">
                    <label>Section NO.</label>
                    <input name="sectionid" type="text" class="form-control" placeholder="Chapter ID">
                </div>

                <button type="submit" class="btn btn-default">Go To</button>
                <?php
                    $templink= url("/admin/material/add");
                echo"<a class=\"btn btn-default\" href=\"$templink\" role=\"button\">Add new section</a>";
                ?>
            </form>
            <br>
        </div>

        </div>


        <div class="col-xs-1 col-sm-2 col-md-2"></div>
    </div>

</body>

</html>