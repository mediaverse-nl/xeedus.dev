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
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.1.3/css/bootstrap-slider.css" rel="stylesheet">

    <link rel="stylesheet" href="/rating/css/star-rating.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="/rating/themes/krajee-fa/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="/rating/themes/krajee-svg/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="/rating/themes/krajee-uni/theme.css" media="all" type="text/css"/>

    <style>
        /* Sticky footer styles
       -------------------------------------------------- */
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            /* Margin bottom by footer height */
            margin-bottom: 100px;
            font-family: 'Lato';
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            background-color: #f5f5f5;
        }
        .footer-content {
            height: 200px;
            background-color: #222;
        }
        .footer-links {

            background: #E7A456;
            height: 50px;;
        }
        .footer-links > div > div > p {
            margin: 15px;
        }
        .footer-links a {
            color: black !important;
            margin-right: 30px;
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
        .dropdown-menu-large{
            width: 40px;
        }
        .dropdown-menu-large > li{
            float: left !important;
            height: 20px;
        }
        .sub-menu{
          margin-left: 50px;
        }
        .navbar-brand {
            padding: 0px; /* firefox bug fix */
        }
        .navbar-brand>img {
            height: 150%;
            padding: 10px; /* firefox bug fix */
            width: auto;
        }
        .video-wrapper {
            width: 100%;
            /* whatever width you want */
            display: inline-block;
            position: relative;
        }
        .video-wrapper:after {
            padding-top: 56.25%;
            /* 16:9 ratio */
            display: block;
            content: '';
        }
        .video-main {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            /* fill parent */
            background-color: deepskyblue;
            /* let's see it! */
            color: white;
        }
        .video-wrapper {
            width: 100%;
            /* whatever width you want */
            display: inline-block;
            position: relative;
        }
        .video-wrapper:after {
            padding-top: 56.25%;
            /* 16:9 ratio */
            display: block;
            content: '';
        }
        .video-container {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            /* fill parent */
            background-color: black;
            /* let's see it! */
            color: white;
        }
        #custom-search-input {
            margin:0;
            margin-top: 10px;
            padding: 0;
        }
        #custom-search-input .search-query {
            padding-right: 3px;
            padding-right: 4px \9;
            padding-left: 3px;
            padding-left: 4px \9;
            /* IE7-8 doesn't have border-radius, so don't indent the padding */

            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }
        #custom-search-input button {
            border: 0;
            background: none;
            /** belows styles are working good */
            padding: 2px 5px;
            margin-top: 2px;
            position: relative;
            left: -28px;
            /* IE7-8 doesn't have border-radius, so don't indent the padding */
            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            color:#D9230F;
        }
        .search-query:focus + button {
            z-index: 3;
        }
        .thumbnail {
            padding:0px;
        }
        .panel {
            position:relative;
        }
        .panel>.panel-heading:after,.panel>.panel-heading:before{
            position:absolute;
            top:11px;left:-16px;
            right:100%;
            width:0;
            height:0;
            display:block;
            content:" ";
            border-color:transparent;
            border-style:solid solid outset;
            pointer-events:none;
        }
        .panel>.panel-heading:after{
            border-width:7px;
            border-right-color:#f7f7f7;
            margin-top:1px;
            margin-left:2px;
        }
        .panel>.panel-heading:before{
            border-right-color:#ddd;
            border-width:8px;
        }
    </style>
</head>
<body id="app-layout" style="margin-top: 100px;">
    <nav class="navbar navbar-default navbar-fixed-top">
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
                <a class="navbar-brand" href="{{ URL::route('home_page') }}">
                    <img class="logo" src="/sitefiles/logo.png">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                    <li class="dropdown dropdown-large">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Courses <b class="caret"></b></a>

                        <ul class="menu dropdown-menu dropdown-menu-large row ">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ url('courses/'.str_replace(' ', '-', $category->name).'')  }}">{{ $category->name }}</a>
                                    <ul class="sub-menu">
                                        @foreach($category->children as $child)
                                            <li class="sub"><a href="{{ url('courses/'.str_replace(' ', '-', $child->name).'') }}">{{ $child->name }}</a></li>
                                        @endforeach()
                                    </ul>
                                </li>
                            @endforeach
                        </ul>

                    </li>
                    <li>
                        {!! Form::open( array('route' => 'search_videos', 'method' => 'get' )) !!}
                            <div id="custom-search-input" class="form-group {{ $errors->has('keyword') ? ' has-error' : '' }}" style="width: 250px;">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="search-query form-control" placeholder="Search" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button">
                                            <span class=" glyphicon glyphicon-search"></span>
                                        </button>
                                        @if ($errors->has('keyword'))
                                            <strong>{{ $errors->first('keyword') }}</strong>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        {!! Form::close() !!}
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
                            <li><a href="{{ route('author_home') }}">author panel</a></li>
                        @endif

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-sign-out"></i>Profile</a> </li>
                                <li><a href="{{ URL::route('profile_courses_index') }}"><i class="fa fa-btn fa-sign-out"></i>My Courses</a> </li>
                                <li><a href="{{ URL::route('credits_index') }}"><i class="fa fa-btn fa-sign-out"></i>Credits ({{Auth::user()->credits}})</a> </li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="footer-basic-centered" style="background-color: #F8F8F8;">
            <div class="footer-content">
                <div class="container">
                    <a href="{{URL::route('author_create')}}" class="">partner</a>
                    <a href="{{URL::route('page_faq')}}">FAQ</a>
                    <a href="{{URL::route('page_contact')}}">Contact</a>
                    <a href="{{URL::route('page_about')}}">About us</a>
                    <a href="{{URL::route('page_support')}}">Support</a>
                    <div class="col-lg-4 pull-right">
                        <a>Facebook</a>
                        <a>Twitter</a>
                        <a>Google+</a>
                        <a>Linkedin</a>
                    </div>
                </div>
            </div>
            <div class="footer-links">
                <div class="container">
                    <div class="col-lg-12">
                        <p class="">
                            <span class="pull-right"> © 2016 Xeedus B.V.</span>
                            <a href="{{URL::route('page_privacy')}}">privacy policy</a>
                            <a href="{{URL::route('page_terms')}}">Terms </a>
                            <a href="{{URL::route('page_cookie')}}">cookie policy</a>
                            <a href="{{URL::route('page_sitemap')}}">site map</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

    <script src="/rating/js/star-rating.js" type="text/javascript"></script>
    <script src="/rating/themes/krajee-fa/theme.js" type="text/javascript"></script>
    <script src="/rating/themes/krajee-svg/theme.js" type="text/javascript"></script>
    <script src="/rating/themes/krajee-uni/theme.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
    <script type="text/javascript">
        <!--

        $(document).ready(function () {

            window.setTimeout(function() {
                $(".alert").fadeTo(1500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 5000);

        });
        //-->
    </script>

    @yield('javascript')

</body>
</html>
