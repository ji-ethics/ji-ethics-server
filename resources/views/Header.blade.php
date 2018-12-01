



    <nav class="navbar navbar-default ">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <?php
                $Link_gohomepage = url('/homepage');
                echo"<a class=\"navbar-brand\" href=$Link_gohomepage>LOGO</a>";
                ?>
            </div>


            <div>
                <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->user_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest


                <?php
                    $Link_gohomepage = url('/homepage');
                    echo"<li><a href=$Link_gohomepage><b>About</b></a></li>";
                ?>
<!--                    --><?php
//                        // figure the logging status and read the user name
//
//                        $json_string = file_get_contents('database/user.json');
//                        $data = json_decode($json_string,true);
//                        foreach ($data["user"] as $key => $value) {
//                            if($value["is_active"] == "1"){
//                                $results = $value["name"];
//                                echo "<li><a href=\"#\"><b>$results</b></a></li>";
//                            } else{
//                                echo "<li><a href=\"#\"><b>Login</b></a></li>";
//                            }
//                        }
//
//                    ?>

                    <li><a href="#"><b>中文</b></a></li>

                </ul>
            </div>

            </div><!-- /.navbar-collapse -->
        </div>
    </nav>





