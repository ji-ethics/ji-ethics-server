
@extends('admin.Header')
@section('content')
<div class="padding">

    <?php
        echo"<div><h1>Add a New Survey</h1></div>"
    ?>

    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">
            <form action="/survey_add" method="POST" target = "nm_iframe">

                {{ csrf_field() }}
                <?php
                    echo"<br/><br/><br/>";

                    echo "<h3>Survey id</h3>";
                    echo "<div class=\"form-group\">";
                    echo "<textarea name=\"id\"   style=\"height:40px\" class=\"form-control\" placeholder=\"Please input a number in the box\">";

                    echo "</textarea>";
                    echo "</div>";

                    echo "<label>Survey Title</label>";
                    echo "<div class=\"form-group\">";
                    echo "<textarea name=\"title\"   style=\"height:60px\" class=\"form-control\" placeholder=\"Please input your title in the box\">";

                    echo "</textarea>";
                    echo "</div>";
                    for ($i = 0;$i<=5;$i++)
                    {
                        echo "<label>Choice $i</label>";
                        echo "<div class=\"form-group\">";
                        echo "<textarea name=\"choice$i\"  style=\"height:40px\" class=\"form-control\" placeholder=\"Please input your choice detail in the box\">";

                        echo "</textarea>";
                        echo "</div>";
                    }


                    echo"<button type=\"submit\" class=\"btn btn-default\" >submit</button>";
                    echo "<br/>";
                    echo "<br/>";
                ?>
            </form>
<?php
                    echo "<iframe id=\"id_iframe\" name=\"nm_iframe\" style=\"display:none;\"></iframe>";
                    echo"<br/>";
                    echo"<br/>";
                    echo"<br/>";

                    echo"<div class = \"text-center\">";
                    $link_back = url("/showsurvey");
                    echo"<a class=\"btn btn-default\" href= $link_back>Back to Check Page</a>";
                    echo"</div>";

                echo"<br/>";
                echo"<br/>";
                echo"<br/>";
?>







        </div>


        <div class="col-md-2"></div>




    </div>


    <div class="col-xs-1 col-sm-2 col-md-2"></div>
</div>
@endsection