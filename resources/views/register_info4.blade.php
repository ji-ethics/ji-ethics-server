<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Religious Background</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
@include('Header1')
<h2 class="text-center">   Religious Background   </h2>
<div class = "row">
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
    <div class="col-xs-10 col-sm-10 col-md-8">
        <font size="4">
        <div id="aff">
            <br/>
            <label>Current religious affiliation</label>
            <select class="form-control" id="affiliation" onchange="AddInput(this.id)" style="width:300px;">
                <option value="1">Buddhist</option>
                <option value="2">Catholic Christianity </option>
                <option value="3">Hindu</option>
                <option value="4">Jewish</option>
                <option value="5">Mormon</option>
                <option value="6">Muslim</option>
                <option value="7">Non-believer (agnostic or atheist)</option>
                <option value="8">Protestant Christianity</option>
                <option value="0">Other</option>
            </select>

        </div>

        <div id = "Ori">
            <br/>
            <label>Political orientation</label>
            <select class="form-control" id="Orientation"  style="width:300px;">
                <option value="1">Very liberal</option>
                <option value="2">Somewhat liberal</option>
                <option value="3">Neither liberal nor conservative</option>
                <option value="4">Somewhat conservative</option>
                <option value="5">Very conservative</option>
            </select>

        </div>

        </font>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
</div>
<br/><br/><br/>
<div class="text-center">
    <br/><br/><br/>
    <?php
    $Link_login = url('/Login');
    echo"<a href = $Link_login><button type=\"submit\" class=\"btn btn-default\"> Submit </button></a>";
    ?>
</div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
@include('Footer')
</body>
<script type="text/javascript">

    function AddInput(x)
    {
        debugger
        var div =document.getElementById(x).parentNode;
        if  (document.getElementById(x).value=="0")
        {
            var newInput = document.createElement("input");
            newInput.class="form-control selectInput";
            newInput.placeholder="If you choose Other, please specify";
            newInput.style="font-size:4;width:900px;height:30px;margin:1% 0%;";
            newInput.maxlength="50";
            newInput.name="Input"
            div.appendChild(newInput);
        }
        else
        {
            div.childNodes.forEach(function(e){
                if (e.name=="Input")
                {
                    var oldInput = e;
                    div.removeChild(oldInput);
                }
            })

        }
    }


</script>