<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    @yield('add_top')

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/ccoders.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container header-container">
            <div class="row">
                <div class="col-xs-3">
                    <div class="site-logo-holder">
                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ url('images/logo6_bw.png') }}" alt="{{ config('app.name', 'Laravel') }}"/>

                        </a>
                    </div>
                </div><!-- /.span4 -->
            </div>
            <div class="row" style="margin-top:-35px;">
                <div class="col-xs-3"></div>
                <div class="col-xs-9">

                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>


                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (!Auth::guest())
                                <li role="presentation" class="dropdown">
                                    <a href="{{ url('/') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Blog <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('blog') }}" >DM Posts</a></li>
                                        <li><a href="{{ url('blog/comment/my_comments') }}">My Comments</a></li>
                                        @if(Entrust::hasRole('admin')||Entrust::hasRole('dm'))
                                            <li><a href="{{ url('blog/my_posts') }}">My Posts</a></li>
                                            <li><a href="{{ url('blog/add') }}">Add Post</a></li>
                                        @endif
                                    </ul>
                                </li>
                                @if (Auth::user()->active && Entrust::hasRole('admin')||Entrust::hasRole('dm')||Entrust::hasRole('player'))
                                    <li role="presentation" class="dropdown">
                                        <a href="{{ url('/') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Characters <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('character') }}" >Tracker</a></li>
                                            <li><a href="{{ url('character/add') }}" >Add</a></li>
                                            @if(Entrust::hasRole('admin')||Entrust::hasRole('dm'))
                                                <li><a href="{{ url('character/all') }}">All Characters</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                @endif
                                @if (Auth::user()->active && Entrust::hasRole('admin')||Entrust::hasRole('dm'))
                                    <li role="presentation" class="dropdown">
                                        <a href="{{ url('/') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Monsters <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('monster') }}" >Tracker</a></li>
                                            <li><a href="{{ url('monster/add') }}" >Add</a></li>
                                        </ul>
                                    </li>
                                @endif

                                @if (Entrust::hasRole('admin'))
                                    <li role="presentation" class="dropdown">
                                        <a href="{{ url('/admin') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin Panel <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('admin/users') }}" >Manage Users</a></li>
                                        </ul>
                                    </li>
                                @endif
                            @endif


                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </nav>


    @yield('content')



    <footer class="footer">
        <div class="container">
            &copy; Copyright {{ date("Y") }} | Custom Coders
            <div class="pull-right">
                {{--<a href="{{ url('privacy-policy') }}">Privacy Policy</a> |--}}
                {{--<a href="{{ url('sitemap') }}">Site Map</a>--}}
            </div>
        </div>
    </footer>


    <!-- JavaScripts -->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.css"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.print.css"></script>

    @yield('add_js')

</body>
</html>
