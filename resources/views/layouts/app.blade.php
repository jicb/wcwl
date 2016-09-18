<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/wcwlgzh/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/wcwlgzh/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/wcwlgzh/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/wcwlgzh/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    {{--<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->--}}


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="wraper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home">WCWLGZH</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in fa-fw"></i> Login</a></li>
                <li><a href="{{ url('/register') }}"><i class="fa fa-paper-plane fa-fw"></i> Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>
</div>

@yield('content')

        <!-- Scripts -->
<script src="/js/app.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/wcwlgzh/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="/wcwlgzh/vendor/raphael/raphael.min.js"></script>
<script src="/wcwlgzh/vendor/morrisjs/morris.min.js"></script>
<script src="/wcwlgzh/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/wcwlgzh/dist/js/sb-admin-2.js"></script>


<!-- Flot Charts JavaScript -->
<script src="/wcwlgzh/vendor/flot/excanvas.min.js"></script>
<script src="/wcwlgzh/vendor/flot/jquery.flot.js"></script>
<script src="/wcwlgzh/vendor/flot/jquery.flot.pie.js"></script>
<script src="/wcwlgzh/vendor/flot/jquery.flot.resize.js"></script>
<script src="/wcwlgzh/vendor/flot/jquery.flot.time.js"></script>
<script src="/wcwlgzh/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
<script src="/wcwlgzh/data/flot-data.js"></script>
</body>
</html>
