@extends('admin.Header')

@section('style')
    @parent
    <style>
        .dash-panel {width: 90%; height: 90%;}
        .panel-body {height: 40%}
        /*.footer-btn {float:right}*/
    </style>
@endsection

@section('content')

@guest('admin')
    <div class="jumbotron">
        <div class="container">
            <h1>Welcome</h1>
            <p>This is the admin page.</p>

            <?php
            $link_survey = url('/admin/login');
            echo"<p><a class=\"btn btn-primary btn-lg\" href=$link_survey role=\"button\">Log in</a></p>";
            ?>

        </div>
    </div>



@else
    <div class="padding">

        <div><h1>Administer Page</h1></div>

        <div class="container">
        <div class="row">
            <div class="col-xs-1 col-sm-2 col-md-2"></div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="panel panel-primary dash-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Study material</h3>
                    </div>
                    <div class="panel-body">
                        <p>Adjusting the study material. </p>

                    </div>
                    <div class="panel-footer">
                        <?php
                        $tmp1 = url("showstudymaterial");
                        echo "<a href = $tmp1  class=\"btn btn-primary footer-btn\" role=\"button\">Material Management</a>"

                        ?>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="panel panel-primary dash-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">User</h3>
                    </div>
                    <div class="panel-body">
                        <p>Manage the user</p>

                    </div>
                    <div class="panel-footer">
                        <?php
                        $tmp2 = url("/users");
                        echo "<a href = $tmp2  class=\"btn btn-primary footer-btn\" role=\"button\">User Management</a>"

                        ?>
                    </div>
                </div>

            </div>
            <div class="col-xs-1 col-sm-2 col-md-2"></div>
        </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-xs-1 col-sm-2 col-md-2"></div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="panel panel-primary dash-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Survey Management</h3>
                    </div>
                    <div class="panel-body">
                        <p>Adjusting the Survey question</p>

                    </div>
                    <div class="panel-footer">
                        <?php
                        $tmp3 = url("/showsurvey");
                        echo "<a href = $tmp3  class=\"btn btn-primary footer-btn\" role=\"button\">Check</a>"

                        ?>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="panel panel-primary dash-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">View answers</h3>
                    </div>
                    <div class="panel-body">
                        <p>View the answer of the students</p>

                    </div>
                    <div class="panel-footer">
                        <?php
                        $tmp4= url("/showResult");
                        echo "<a href = $tmp4  class=\"btn btn-primary footer-btn\" role=\"button\">View Answer</a>"

                        ?>
                    </div>
                </div>

            </div>
            <div class="col-xs-1 col-sm-2 col-md-2"></div>
        </div>
        </div>
    </div>
@endguest
@endsection