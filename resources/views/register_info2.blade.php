<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Language Information</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
@include('Header1')
<h2 class="text-center">   Language Background </h2>
<div id = "Alllang">
<div class = "language">
<div class = "row" style="margin:0% 2%;">
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
    <div class="col-xs-10 col-sm-10 col-md-8" >
        <div>
            <font size="4">

                <div>
                    <label>Languages</label>
                    <?php
                    echo "<select class=\"form-control\" style=\"width:400px;\">";
                    $languages = json_decode($language, true);
                    foreach ($languages as $value) {
                        $id =  $value["id"];
                        $name = $value["name"];
                        echo "<option>$name</option>";
                    }
                    echo "</select>"
                    ?>
                </div>
                <div style="margin:2% 0%;">
                    <label>Order in which language was learned:</label>
                    <select class="form-control" style="width:400px;">
                        <option>Native</option>
                        <option>Second</option>
                        <option>Third</option>
                        <option>Fourth</option>
                    </select>
                </div>

            </font>
        </div>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
</div>
<br/>
<font size="3">
    <div class="row a" style="margin:0% 2%;">
        <div class="col-xs-1 col-sm-1 col-md-2"> </div>
        <div class="col-xs-5 col-sm-5 col-md-4">
            <label>Speaking</label>
            <select class="form-control" style="width:400px;">
                <option>Almost none</option>
                <option>Poor</option>
                <option>Fair</option>
                <option>Good</option>
                <option>Very good</option>
            </select>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-4">
            <label>Reading</label>
            <select class="form-control" style="width:400px;">
                <option>Almost none</option>
                <option>Poor</option>
                <option>Fair</option>
                <option>Good</option>
                <option>Very good</option>
            </select>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-2"> </div>
    </div>
    <div class="row" style="margin:1% 2%;">
        <div class="col-xs-1 col-sm-1 col-md-2"> </div>
        <div class="col-xs-5 col-sm-5 col-md-4">
            <label>Listening</label>
            <select class="form-control" style="width:400px;">
                <option>Almost none</option>
                <option>Poor</option>
                <option>Fair</option>
                <option>Good</option>
                <option>Very good</option>
            </select>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-4">
            <label>Writing</label>
            <select class="form-control" style="width:400px;">
                <option>Almost none</option>
                <option>Poor</option>
                <option>Fair</option>
                <option>Good</option>
                <option>Very good</option>
            </select>
        </div>
        <br/>
        <br/>

        <div class="col-xs-1 col-sm-1 col-md-2"> </div>
    </div>
</font>
    <br/>
    <br/>
</div>
</div>

<div align="center">
    <button class="btn btn-default" onclick="addlanguage()"> Add another language </button>
    <br/>
    <br/>
    <br/>
    <br/>
    <?php
    $tmp = url("/register/info3");
    echo "<a href= $tmp><button type=\"submit\" class=\"btn btn-default\"> Next </button></a>"
    ?>
</div>


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


@include('Footer')
</body>
<script type="text/javascript">
    var Alllang = document.getElementById("Alllang");
    function addlanguage(){
        var lang = document.getElementsByClassName("language")[0];
        var clang = lang.cloneNode(true);
        Alllang.appendChild(clang);
    }
</script>