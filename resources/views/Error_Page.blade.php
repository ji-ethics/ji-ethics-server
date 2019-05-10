@extends('layouts.app')
@section('content')
<div class="padding">

    <div class="text-center"><h1>Error Page</h1></div>

    <br/>
    <br/>
    <?php
    echo"<div><h2>Error Data: $errordata</h2></div>";

    echo"<div><a class=\"btn btn-default\" href=\"$return_url\" role=\"button\"> Return </a></div>"

    ?>
</div>


@endsection
