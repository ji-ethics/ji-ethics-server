<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demographic Information</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
@include('Header1')
<div class = "row">
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
    <div class="col-xs-8 col-sm-8 col-md-8" style="margin:2%;">
        <h2 class="text-center">   Demographic Information    </h2>
        <div>
            <font size="4">

                <div>
                    <br/>
                     <label>User type</label>
                    <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>
                        student
                    </label>
                    </div>
                    <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="2">
                        non-student
                    </label>
                    </div>
                </div>
                <div>
                    <label>Ages</label>
                    <?php
                    echo "<select class=\"form-control\" style=\"width:300px;\">";
                    for ($x=18; $x<=100; $x++) {
                        echo "<option>$x</option>";
                    }
                    echo "</select>";
                    ?>
                </div>
                <div>
                    <br/>
                    <label>Gender</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios2" id="optionsRadios1" value="21" checked>
                            male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios2" id="optionsRadios2" value="22">
                            female
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios2" id="optionsRadios3" value="23">
                            other
                        </label>
                    </div>
                </div>

                <div>

                    <label>Nationality</label>
                    <?php
                    echo "<select class=\"form-control\" style=\"width:300px;\">";
                    $nationalities = json_decode($nationality, true);
                    foreach ($nationalities as $value) {
                        $id =  $value["id"];
                        $name = $value["name"];
                        echo "<option>$name</option>";
                    }
                    echo "</select>"
                    ?>
                </div>
                <div id="ide">
                    <br/>
                    <label>How do you identify?</label>
                    <select class="form-control" id="identify" onchange="AddInput(this.id)" style="width:300px;">
                        <option value="1">Asian</option>
                        <option value="2">Black </option>
                        <option value="3">Hispanic</option>
                        <option value="4">White</option>
                        <option value="0">Other</option>
                    </select>
                </div>
                <div class="text-center">
                <?php
                $tmp = url("/register/info2");
                echo "<a href= $tmp><button type=\"submit\" class=\"btn btn-default\"> Next </button></a>"
                ?>
                </div>
            </font>
        </div>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
</div>


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


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
            newInput.style="font-size:4;width:90%;height:30px;margin:1% 0%;";
            newInput.maxlength="50";
            newInput.name="Input";
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