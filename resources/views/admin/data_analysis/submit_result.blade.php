@extends('admin.Header')

@section('content')
    The request has been sent.
    <?php
    $tmp4= url("/DataAnalysis/Results");
    echo "<p><a href = $tmp4  class=\"btn btn-primary\" role=\"button\">Check</a></p>";
    echo $message;
    ?>

@endsection

