@extends('layouts.app')
@section('content')
<div class = "row">
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
    <div class="col-xs-8 col-sm-8 col-md-8" style="margin:2%;">
        <h2 class="text-center">   Demographic Information    </h2>
        <div>
                <form action="/info1_get" method="POST">

                    {{ csrf_field()}}

                    <label style="display:none">
                        <?php
                        echo "<input name=\"id\" value=\"$id\">"
                        ?>
                    </label>
                    <div>
                    <br/>
                     <label>User type</label>
                    <div class="radio">
                    <label>
                    <input type="radio" name="usertype" id="" value="student" checked>
                        student
                    </label>
                    </div>
                    <div class="radio">
                    <label>
                    <input type="radio" name="usertype" id="" value="non-student">
                        non-student
                    </label>
                    </div>
                </div>
                <div>
                    <label>Ages</label>
                    <?php
                    echo "<select class=\"form-control\" name=\"age\" style=\"width:300px;\">";
                    for ($x=18; $x<=100; $x++) {
                        echo "<option value = \"$x\">$x</option>";
                    }
                    echo "</select>";
                    ?>
                </div>
                <div>
                    <br/>
                    <label>Gender</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" id="" value="male" checked>
                            male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" id="" value="female">
                            female
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" id="optionsRadios3" value="other">
                            other
                        </label>
                    </div>
                </div>

                <div>

                    <label>Nationality</label>
                    <?php
                    echo "<select class=\"form-control\" name = \"nationality\" style=\"width:300px;\">";
                    $nationalities = json_decode($nationality, true);
                    foreach ($nationalities as $value) {
                        $id =  $value["id"];
                        $name = $value["name"];
                        echo "<option value = \"$name\">$name</option>";
                    }
                    echo "</select>"
                    ?>
                </div>
                <div id="ide">
                    <br/>
                    <label>How do you identify?</label>
                    <select class="form-control" name = "identification" id="identification" onchange="AddInput(this.id)" style="width:300px;">
                        <option value="Asian">Asian</option>
                        <option value="Black">Black </option>
                        <option value="Hispanic">Hispanic</option>
                        <option value="White">White</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="text-center">

                <?php
                    $tmp = url("/register/info2");
                echo " <a href= $tmp><button type=\"submit\" class=\"btn btn-default\"> Next </button></a>"
                ?>
                </div>
                </form>
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


@endsection

@section('script')
    @parent
<script type="text/javascript">

    function AddInput(x)
    {
        debugger
        var div =document.getElementById(x).parentNode;
        if  (document.getElementById(x).value=="Other")
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
@endsection