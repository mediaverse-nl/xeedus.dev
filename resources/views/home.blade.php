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


    <div class="container container-fix">
    <div class="row">
    <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>
        <div class="col-md-12">
            <div class="panel panel-default">



                <div class="panel-body">
                    {{--{{dd($best_video)}}--}}
                    <div>
                        <h2>categories</h2>
                        {{--@foreach($categories as $category)--}}
                            {{--<a class="btn btn-default" href="{{ URL::route('video_categories_sub', str_replace(' ', '-', $category->name) ) }}">{{ $category->name  }}</a>--}}
                        {{--@endforeach--}}
                    </div>

                    <h2>recently</h2>
                    <div class="slider">
                        @foreach($video as $vid )
                            <div class="thumbnail">
                                <img src="/{{$vid->thumbnails}}" alt="">
                                <div class="caption">
                                    <h3>{{$vid->name}}</h3>
                                    <p>...</p>
                                    <p> <a class="btn btn-default" href="{{URL::route('video_show', $vid->video_key)}}">show video</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <h2>Best</h2>
                    <div class="slider">
                        @foreach($video as $vid )
                            <div class="thumbnail">
                                <img src="/{{$vid->thumbnails}}" alt="">
                                <div class="caption">
                                    <h3>{{$vid->name}}</h3>
                                    <p>...</p>
                                    <p> <a class="btn btn-default" href="{{URL::route('video_show', $vid->video_key)}}">show video</a></p>
                                </div>
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
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,

            // the magic
            responsive: [{

                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }

            }, {

                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }

            }, {

                breakpoint: 300,
                settings: "unslick" // destroys slick

            }]
        });
    </script>

@endsection