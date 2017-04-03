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
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.1.3/css/bootstrap-slider.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/app.css">

    @stack('css')
</head>
<body id="app-layout" style="margin-top: 70px;">
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
                    <img class="logo" src="/sitefiles/logo-white.png" height="45px">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                    <li class="dropdown dropdown-large">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Courses <b class="caret"></b></a>

                        <ul class="menu dropdown-menu dropdown-menu-large row">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('category_index', [str_replace(' ', '-', $category->name), $category->id]) }}">{{ $category->name }}</a>
                                    <ul class="sub-menu">
                                        @foreach($category->children as $child)
                                            <li class="sub"><a href="{{route('video_index',[str_replace(' ','-', $child->parent->name),str_replace(' ','-', $child->name),$child->id])}}">{{ $child->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>

                    </li>
                </ul>
                <ul class="nav navbar-nav">
                        <form class="typeahead form-group" role="search">
                            <input type="search" name="q" class="form-control search search-input typeahead" value="Zoek op producten" autocomplete="off">
                        </form>
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

<footer>
    <div class="-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <label class="-label">Xeedus</label>
                    <ul class="-list">
                        <li><a href="{{URL::route('author_create')}}">Over Xeedus</a></li>
                        <li><a href="{{URL::route('page_faq')}}">Xeedus Guidelines</a></li>
                        <li><a href="http://esigareteindhoven.com/privacy-policy">Vacatures</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <label class="-label">Help</label>
                    <ul class="-list">
                        <li><a href="{{URL::route('author_create')}}">Help Center</a></li>
                        <li><a href="{{URL::route('page_faq')}}">Video School</a></li>
                        <li><a href="http://esigareteindhoven.com/privacy-policy">FAQ</a></li>
                        <li><a href="">Forums</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <label class="-label"></label>
                    <ul class="-list">
                        <li><a href="{{URL::route('author_create')}}">Hier komt een hele</a></li>
                        <li><a href="{{URL::route('page_faq', '')}}">Lange test link waardoor</a></li>
                        <li><a href="http://esigareteindhoven.com/privacy-policy">wij precies kunnen gaan</a></li>
                        <li><a href="">zien hoe dit eruit gaat zien</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <label class="-label">Xeedus link</label>
                    <ul class="-list">
                        <li><a href="{{URL::route('author_create')}}">Hier komt een hele</a></li>
                        <li><a href="{{URL::route('page_faq')}}">Lange test link waardoor</a></li>
                        <li><a href="http://esigareteindhoven.com/privacy-policy">wij precies kunnen gaan</a></li>
                        <li><a href="">zien hoe dit eruit gaat zien</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="-subfooter">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    <a href="http://www.mediaverse.nl" class="text-muted pull-right">Mediaverse © 2016 All rights reserved.</a>
                </div>
            </div>
        </div>
    </div>
</footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    {{--bloodhound--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js" type="text/javascript"></script>

    <script>

    </script>

    <script type="text/javascript">
    // create the back to top button
    $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

    var amountScrolled = 300;

    $(window).scroll(function() {
        if ( $(window).scrollTop() > amountScrolled ) {
            $('a.back-to-top').fadeIn('slow');
        } else {
            $('a.back-to-top').fadeOut('slow');
        }
    });

    $('a.back-to-top, a.simple-back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 700);
        return false;
    });
    </script>

    <script>
        jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                remote: {
                    url: '/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                local: name
            });
            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'product',
                displayKey: 'name',
                source: engine.ttAdapter(),
                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown" style="margin-top: 20px; color: #231f20;"> <div class="list-group-item">Er zijn geen producten gevonden...</div>  </div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown" style="margin-top: 0px; color: #231f20;">'
                    ],
                    suggestion: function (data) {
                        return '<a href="/' + data.name.replace(/ /g,"-") + '/p-' + data.id + '" class="list-group-item" style="height: 50px; line-height: 25px; width: 350px;">' + data.name + '<label class="pull-right">' + data.author_id + '</label></a>'
                    }
                }
            });
        });
    </script>

    @stack('javascript')

</body>
</html>
