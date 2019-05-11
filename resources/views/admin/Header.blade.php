<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
    @section('style')
        <style type="text/css">
            body { padding-top: 70px; }
            .left-side-menu { float: left ; width: 15%;}
            /*.page-contents { margin-left: 15%; }*/
        </style>
    @show
</head>
<body>


<div id="app">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <?php
                $Link_gohomepage = url('/admin');
                echo"<a class=\"navbar-brand\" href=$Link_gohomepage>"
                ?>
                <img src="{{ asset('image/JILOGO.png') }}" width="200" alt="Brand"/>
                <?php
                echo"</a>";
                ?>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest('admin')
                        <li><a href="{{ url('/admin/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                    {{--<li><a href="#"><b>中文</b></a></li>--}}
                </ul>
            </div>
        </div>
    </nav>
    {{--<div class="left-side-menu">--}}
        {{--<ul class="nav nav-pills nav-stacked">--}}
            {{--<li role="presentation" class="active"><a href="#">Home</a></li>--}}
            {{--<li role="presentation"><a href="#">Profile</a></li>--}}
            {{--<li role="presentation"><a href="#">Messages</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}

    <div class="page-contents">
        @yield('content')
    </div>
</div>


<!-- Scripts -->
@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
@show
</body>
</html>





