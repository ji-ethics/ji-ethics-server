@extends('layouts.app')
@section('content')
<h2 class="text-center">   Language Background </h2>
<form action="/info2_get" method="POST">
    {{ csrf_field() }}
<div id = "Alllang">
<div class = "language">
<div class = "row" style="margin:0 2%;">
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
    <div class="col-xs-10 col-sm-10 col-md-8" >
        <div>
                <div>
                    <label style="display:none">
                        <?php
                        echo "<input name=\"id\" value=\"$id\">"
                        ?>
                    </label>

                    <label>Languages</label>
                    <?php
                    echo "<select class=\"form-control\" name = \"language[]\" style=\"width:400px;\">";
                    $languages = json_decode($language, true);
                    foreach ($languages as $value) {
                        $id =  $value["id"];
                        $name = $value["name"];
                        echo "<option value=\"$name\">$name</option>";
                    }
                    echo "</select>"
                    ?>
                </div>
                <div style="margin:2% 0;">
                    <label>Order in which language was learned:</label>
                    <select class="form-control" name="order[]" style="width:400px;">
                        <option value="Native">Native</option>
                        <option value="Second">Second</option>
                        <option value="Third"> Third</option>
                        <option value="Fourth">Fourth</option>
                    </select>
                </div>

        </div>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-2"> </div>
</div>
<br/>
    <div class="row a" style="margin:0 2%;">
        <div class="col-xs-1 col-sm-1 col-md-2"> </div>
        <div class="col-xs-5 col-sm-5 col-md-4">
            <label>Speaking</label>
            <select class="form-control" name="speaking[]" style="width:400px;">
                <option value="Almost none">Almost none</option>
                <option value="Poor">Poor</option>
                <option value="Fair">Fair</option>
                <option value="Good">Good</option>
                <option value="Very good">Very good</option>
            </select>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-4">
            <label>Reading</label>
            <select class="form-control" name="reading[]" style="width:400px;">
                <option value="Almost none">Almost none</option>
                <option value="Poor">Poor</option>
                <option value="Fair">Fair</option>
                <option value="Good">Good</option>
                <option value="Very good">Very good</option>
            </select>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-2"> </div>
    </div>
    <div class="row" style="margin:1% 2%;">
        <div class="col-xs-1 col-sm-1 col-md-2"> </div>
        <div class="col-xs-5 col-sm-5 col-md-4">
            <label>Listening</label>
            <select class="form-control" name="listening[]" style="width:400px;">
                <option value="Almost none">Almost none</option>
                <option value="Poor">Poor</option>
                <option value="Fair">Fair</option>
                <option value="Good">Good</option>
                <option value="Very good">Very good</option>
            </select>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-4">
            <label>Writing</label>
            <select class="form-control" name="writing[]" style="width:400px;">
                <option value="Almost none">Almost none</option>
                <option value="Poor">Poor</option>
                <option value="Fair">Fair</option>
                <option value="Good">Good</option>
                <option value="Very good">Very good</option>
            </select>
        </div>
        <br/>
        <br/>

        <div class="col-xs-1 col-sm-1 col-md-2"> </div>
    </div>
    <br/>
    <br/>
</div>
</div>

<div align="center">
    <button type="button" class="btn btn-default" onclick="addlanguage()"> Add another language </button>
    <br/>
    <br/>
    <br/>
    <br/>
    <?php
    /*$tmp = url("/register/info3");*/
    echo "<button type=\"submit\" class=\"btn btn-default\"> Next </button></a>"
    ?>
</div>
</form>

<br/>
<br/>
<br/>
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
    var Alllang = document.getElementById("Alllang");
    function addlanguage(){
        var lang = document.getElementsByClassName("language")[0];
        var clang = lang.cloneNode(true);
        Alllang.appendChild(clang);
    }
</script>
@endsection