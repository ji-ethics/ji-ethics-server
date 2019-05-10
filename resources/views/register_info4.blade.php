@extends('layouts.app')
@section('content')
<h2 class="text-center">   Religious Background   </h2>
<form action="/info4_get" method="POST">
    {{ csrf_field()}}
<div class = "row">
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
    <div class="col-xs-10 col-sm-10 col-md-8">
        <div id="aff">
            <label style="display:none">
                <?php
                echo "<input name=\"id\" value=\"$id\">"
                ?>
            </label>
            <br/>
            <label>Current religious affiliation</label>
            <select class="form-control" name="affiliation" id="affiliation" onchange="AddInput(this.id)" style="width:300px;">
                <option value="Buddhist">Buddhist</option>
                <option value="Catholic Christianity">Catholic Christianity </option>
                <option value="Hindu">Hindu</option>
                <option value="Jewish">Jewish</option>
                <option value="Mormon">Mormon</option>
                <option value="Muslim">Muslim</option>
                <option value="Non-believer (agnostic or atheist)">Non-believer (agnostic or atheist)</option>
                <option value="Protestant Christianity">Protestant Christianity</option>
                <option value="Other">Other</option>
            </select>

        </div>

        <div id = "Ori">
            <br/>
            <label>Political orientation</label>
            <select class="form-control" name="political_orientation" id="Orientation"  style="width:300px;">
                <option value="Very liberal">Very liberal</option>
                <option value="Somewhat liberal">Somewhat liberal</option>
                <option value="Neither liberal nor conservative">Neither liberal nor conservative</option>
                <option value="Somewhat conservative">Somewhat conservative</option>
                <option value="Very conservative">Very conservative</option>
            </select>

        </div>

    </div>
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
</div>
<br/><br/><br/>
<div class="text-center">
    <br/><br/><br/>
    <?php
    echo"<button type=\"submit\" class=\"btn btn-default\"> Submit </button></a>";
    ?>
</div>
</form>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
@endsection

@section('script')
    @parent
<script type="text/javascript">

    function AddInput(x)
    {
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


</script>
@endsection