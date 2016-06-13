<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') </title>

    <meta name="description" content="@yield('description')" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        ul.menu{ list-style:none;}
        ul.menu > li {
            float: left;
            margin-left: 1em;
            padding-bottom: 3em; /*make this the line-height space underneat the main menu, plus the heigh of the secondary menu, plus the extra space you wanna give the user to not lose focus on the second menu*/
        }
        ul.menu > li:first-child {margin-left: 0;}
        ul.menu > li > ul {
            display: none;
        }
        ul.menu> li:hover > ul {
            position: absolute;
            display: block;
            left: 0;
            list-style: none;
        }
        ul.menu > li:hover > ul > li,
        ul.menu > li > ul:hover > li {
            position: relative;
            float: left;
            margin-left: 1em;
        }
        ul.menu > li:hover > ul > li:first-child,
        ul.menu > li > ul:hover > li:first-child {margin-left: 0px}
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::route('home_page') }}">Home</a></li>

                    <li class="dropdown dropdown-large">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Courses <b class="caret"></b></a>

                        <ul class="menu dropdown-menu dropdown-menu-large row">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ url('courses/'.str_replace(' ', '-', $category->name).'')  }}">{{ $category->name }}</a>
                                    <ul >
                                        @foreach($category->children as $child)
                                            <li class="sub"><a href="{{ url('courses/'.str_replace(' ', '-', $child->name).'') }}">{{ $child->name }}</a></li>
                                        @endforeach()
                                    </ul>
                                </li>
                            @endforeach()
                        </ul>

                    </li>

                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else

                        @if(Auth::user()->isAdmin())
                            <li><a href="{{ url('/admin') }}">admin panel</a></li>
                        @endif

                        @if(Auth::user()->isAuthor())
                            <li><a href="{{ url('/partner') }}">author panel</a></li>
                        @endif

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-sign-out"></i>Profile</a> </li>
                                <li><a href="{{ URL::route('profile_courses_index') }}"><i class="fa fa-btn fa-sign-out"></i>My Courses</a> </li>
                                <li><a href="{{ URL::route('credits_show') }}"><i class="fa fa-btn fa-sign-out"></i>Credits ({{Auth::user()->credits}})</a> </li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    <div class="footer-basic-centered" style="background-color: #F8F8F8;">
        <div class="container">
            <div class="col-lg-12">
                <a href="{{ URL::route('author_create') }}" class="">partner</a>
            </div>
        </div>
    </div>


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @yield('javascript')

</body>
</html>
