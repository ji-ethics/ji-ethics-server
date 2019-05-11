
@extends('admin.Header')
@section('content')
<div class="padding">

    <?php
        echo"<div><h1>Add a New Section for Chapter $id</h1></div>"
    ?>

    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-8 col-md-8">
            <form action="/sectiondetail_add" method="POST" target="nm_iframe">

                {{ csrf_field() }}
                <?php
                echo "<br/>";
                echo "<br/>";
                echo "<label>Section ID</label>";
                echo "<div class=\"form-group\">";
                echo"<textarea name=\"section_id\"  id=\"content\" class=\"form-control\" placeholder=\"Input new section id in the box (only a number please).\">";

                echo"</textarea>";
                echo "</div>";

                echo "<label>Section Title</label>";
                echo "<div class=\"form-group\">";
                echo "<textarea name=\"title\"  style=\"height:60px\" class=\"form-control\" placeholder=\"Input new section title in the box\">";

                echo "</textarea>";
                echo "</div>";

                echo "<label>Section Details</label>";
                echo "<div class=\"form-group\">";
                echo "<textarea name=\"detail\"    style=\"height:300px\" class=\"form-control\" placeholder=\"Input new section details in the box\">";

                echo "</textarea>";
                echo "</div>";

                echo "<div class=\"form-group\" style=\"display:none;\">";
                echo"<textarea name=\"chapter_id\"  style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                echo $id;
                echo"</textarea>";
                echo "</div>";

                echo "<div class=\"form-group\" style=\"display:none;\">";
                echo"<textarea name=\"section_counter\"   style=\"height:80px;max-height:500px;\" class=\"form-control\">";
                echo $section_counter;
                echo"</textarea>";
                echo "</div>";







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
                $link_back = url("/check/chapter/$id");
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