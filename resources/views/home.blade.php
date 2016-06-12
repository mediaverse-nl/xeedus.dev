@extends('layouts.app')

@section('title')
    allo
@endsection

@section('description')

@stop

@section('content')

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>

    <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <div>
                        <h2>categories</h2>
                        @foreach($categories as $category)
                            <a class="btn btn-default" href="{{ URL::route('video_categories_sub', str_replace(' ', '-', $category->name) ) }}">{{ $category->name  }}</a>
                        @endforeach
                    </div>

                    <h2>slider</h2>
                    <div class="slider">
                        @foreach($video as $vid )
                            <div style="background-color: #2b38cd; color: #dddddd; padding: 30px;">
                                {{$vid->name}}
                                <a class="btn btn-default" href="{{URL::route('video_show', $vid->video_key)}}">show video</a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

    <script>
        $(".slider").slick({

            // normal options...
            infinite: false,

            // the magic
            responsive: [{

                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    infinite: true
                }

            }, {

                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    dots: true
                }

            }, {

                breakpoint: 300,
                settings: "unslick" // destroys slick

            }]
        });
    </script>

@endsection