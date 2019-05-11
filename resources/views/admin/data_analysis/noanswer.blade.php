@extends('admin.Header')

@section('content')
    There is nobodying answering this question
    <?php
    $tmp4= url("/dataanalysis");
    echo "<p><a href = $tmp4  class=\"btn btn-primary\" role=\"button\">Return</a></p>"

    ?>
@endsection