@extends('layouts.app')

@section('content')

@guest
    <div class="jumbotron">
        <div class="container">
            <h1>Welcome</h1>
            <?php
            $link_login = url('/login');
            $link_register = url('/register');
            $link_umji = "http://umji.sjtu.edu.cn";
            $link_book = "https://www.elsevier.com/books/global-engineering-ethics/luegenbiehl/978-0-12-811218-2";
            echo"<p>This site hosts content and collects information related to applied ethics and moral psychology. To access educational modules and complete surveys, please <a href = $link_register>register</a> or <a href = $link_login>login</a>.</p>";
            echo"<p>It is the result of interdisciplinary education and research efforts by faculty members, administrators, and students in philosophy, computer science, social psychology, mathematics, and international education at the <a href = $link_umji>University of Michigan-Shanghai Jiao Tong University Joint Institute</a>, and Institute of Social Cognitive and Behavioral Science, Shanghai Jiao Tong University.</p>";
            echo"<p>Scandals involving ethics within engineering, business, and medicine negatively affect members of the public, corporations, and governments. Effective ethics training is necessary to address these problems, as well as to raising the reputations of individuals, organizations, and institutions that value ethics and engage in ethical behaviors. To do so, this site provides educational materials on applied ethics, as well as collects information regarding what people think is right and wrong and why, to further develop ethics curricula and contribute to the development of character and perspectives crucial to international leadership, professionalism, and citizenry. </p>";
            echo"<p>Potential partners in education and industry are encouraged to contact Rockwell Clancy regarding the possibility of using this site in courses, corporate, or professional training: rockwell.clancy@sjtu.edu.cn</p>";
            echo"<p>The educational modules included herein are based on materials abridged from <a href = $link_book><i>Global Engineering Ethics</i></a>, used with the permission of the authors and Elsevier Press. These should not be reproduced without the permission of the authors, Heinz Luegenbiehl and Rockwell Clancy: rockwell.clancy@sjtu.edu.cn.</p>";
            ?>

        </div>
    </div>

    <div class="row">

        <div class="col-xs-1 col-sm-2 col-md-2"></div>


    </div>
    <?php
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    ?>

@else

    <div class="jumbotron">
        <div class="container">
            <h1> Welcome back, {{ Auth::user()->user_name }}</h1>
        <?php

            echo"<p>As a user, you can complete surveys and educational materials on applied ethics</p>";
            $link_survey = url('/chooseonesurvey');
            echo"<p><a class=\"btn btn-primary btn-lg\" href=$link_survey role=\"button\">Start the Survey</a></p>";
            ?>

        </div>
    </div>

    <div class="container-fluid">
    <div class="row">
        <div class="col-xs-1 col-sm-2 col-md-2"></div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="thumbnail">
                <img src="https://images.unsplash.com/photo-1504711331083-9c895941bf81?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" width="300px" alt="img-thumbnail"/>
                <div class="caption">
                    <div class="text-center">
                        <h3>News</h3>
                        <p>Updates about the project</p>
                        <p><a class="btn btn-primary" role="button">Learn More</a> </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="thumbnail">
                <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" width="300px" alt="img-thumbnail"/>
                <?php
                echo"<div class=\"caption\">";

                echo"<div class=\"text-center\">";

                echo"<h3>Study</h3>";



                echo"<p>You could learn more knowledge of ethics in this part</p>";

                $link_gostudy = url('chapter/1/section/1');

                echo"<p><a href=$link_gostudy class=\"btn btn-primary\" role=\"button\">Go Study</a> </p>";

                echo"</div>";
                echo"</div>";
                ?>
            </div>
        </div>
        {{--<div class="col-xs-1 col-sm-2 col-md-2"></div>--}}
    </div>
    </div>
@endguest

@endsection