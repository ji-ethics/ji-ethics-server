@extends('layouts.app')
@section('content')
<div class="padding">



    <br/>
    <br/>
    <?php

    echo"<div class=\"text-center\">";
    echo"<div><h2>You have already finished this survey, please click the button to the survey page</h2></div>";
    echo"<br/>";echo"<br/>";echo"<br/>";
    $return_url = url("chooseonesurvey");
    echo"<div><a class=\"btn btn-default\" href=\"$return_url\" role=\"button\"> Return </a></div>";
    echo"</div>";
    ?>
</div>


@endsection
