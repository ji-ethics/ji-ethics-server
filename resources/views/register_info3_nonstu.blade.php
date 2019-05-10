@extends('layouts.app')
@section('content')

<h2 class="text-center">   Educational & Financial Background   </h2>
<form action="/info3_nonstu_get" method="POST">
    {{ csrf_field()}}
<div class = "row" style="margin:2%;">
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
    <div class="col-xs-10 col-sm-10 col-md-8">
            <div>
                <label style="display:none">
                    <?php
                    echo "<input name=\"id\" value=\"$id\">"
                    ?>
                </label>
                <br/>
                <label>Education Level</label>
                <select class="form-control" name="education_level" id="education_level" style="width:300px;" onchange="showup(this.id)">
                    <option value="1">Less than a high school diploma</option>
                    <option value="2">High school degree or equivalent </option>
                    <option value="3">Some college, no degree</option>
                    <option value="4">Associate degree</option>
                    <option value="5">Bachelor’s degree</option>
                    <option value="6">Master’s degree</option>
                    <option value="7">Professional degree</option>
                    <option value="8">Doctorate</option>
                </select>
                <div style="display:none;">
                    <br/>
                    <label>Major in</label>
                    <?php
                    echo "<select class=\"form-control\" name=\"major_in\" style=\"width:300px;\">";
                    $majors = json_decode($major, true);
                    foreach ($majors as $value) {
                    $id =  $value["id"];
                    $name = $value["name"];
                    echo "<option value=\"$name\">$name</option>";
                    }
                    echo "</select>"
                    ?>
                </div>
            </div>
            <div id="Work_Industry">
                <br/>
                <label>Work industry:</label>
                <?php
                echo "<select class=\"form-control\" style=\"width:400px;\" name=\"industry\" id =\"Industry\" onchange=\"AddInput(this.id)\">";
                $industry= json_decode($industry, true);
                foreach ($industry as $value) {
                    $id =  $value["id"];
                    $name = $value["name"];
                    echo "<option value=\"$name\">$name</option>";
                }
                echo "</select>"
                ?>
            </div>
            <div>
                <br/>
                <label>Work position</label>
                <select class="form-control" name="work_position" id='position' style="width:300px;" onchange="AddInput2(this.id)">
                    <option value="Trained professional">Trained professional</option>
                    <option value="Skilled Laborer">Skilled Laborer</option>
                    <option value="Junior management">Junior management</option>
                    <option value="Middle management">Middle management</option>
                    <option value="Upper management">Upper management</option>
                    <option value="Consultant">Consultant</option>
                    <option value="Administrative Staff">Administrative Staff</option>
                    <option value="Temporary employee">Temporary employee</option>
                    <option value="Researcher">Researcher</option>
                    <option value="Self-employed">Self-employed</option>
                    <option value="Other">Other</option>
                </select>

            </div>
            <div>
                <br/>
                <label>Combined parental/familial income per month before taxes in RMB</label>
                <select class="form-control" name="income_rmb" style="width:300px;">
                    <option value="less than 1,500">less than 1,500</option>
                    <option value="1,500-4,500">1,500-4,500</option>
                    <option value="4,500-9,000">4,500-9,000</option>
                    <option value="9,000-35,000">9,000-35,000</option>
                    <option value="35,000-55,000">35,000-55,000</option>
                    <option value="55,000-80,000">55,000-80,000</option>
                    <option value="80,000 or more">80,000 or more</option>
                    <option value="I don't know">I don't know</option>
                </select>

            </div>
            <div style="display:none;">
                <br/>
                <label>Combined parental/familial income per year before taxes in USD</label>
                <select class="form-control" style="width:300px;">
                    <option value="1">less than 9,999</option>
                    <option value="2">10,000-19,999</option>
                    <option value="3">20,000-29,999</option>
                    <option value="4">30,000-39,999</option>
                    <option value="5">40,000-49,999</option>
                    <option value="6">50,000-59,999</option>
                    <option value="7">60,000-69,999</option>
                    <option value="8">70,000-79,999</option>
                    <option value="9">80,000-89,999</option>
                    <option value="10">90,000-99,999</option>
                    <option value="11">100,000 or more</option>
                    <option value="12">I don’t know</option>
                </select>

            </div>

    </div>
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
</div>
<div class="text-center">
    <?php
/*    $tmp = url("/register/info4");*/
    echo "<button type=\"submit\" class=\"btn btn-default\"> Next </button></a>"
    ?>
</div>
</form>
@endsection

@section('script')
    @parent
<script type="text/javascript">

    function showup(x)
    {
        var div =document.getElementById(x).parentNode;

        if  (document.getElementById(x).value>="3")
        {
            div.lastElementChild.style.display= 'inline';
        }
        else
        {
            div.lastElementChild.style.display= 'none';

        }
    }

    function AddInput(x)
    {
        debugger
        var div =document.getElementById(x).parentNode;
        if  (document.getElementById(x).value=="Other")
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

    function AddInput2(x)
    {
        debugger
        var div =document.getElementById(x).parentNode;
        if  (document.getElementById(x).value=="Other")
        {
            var newInput = document.createElement("input");
            newInput.class="form-control selectInput";
            newInput.placeholder="If you choose Other, please specify";
            newInput.style="font-size:4;width:900px;height:30px;margin:1% 0%;";
            newInput.maxlength="50";
            newInput.name="Input2"
            div.appendChild(newInput);
        }
        else
        {
            div.childNodes.forEach(function(e){
                if (e.name=="Input2")
                {
                    var oldInput = e;
                    div.removeChild(oldInput);
                }
            })

        }
    }
</script>
@endsection