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
            {!! Breadcrumbs::render('home') !!} 
        
        <div class="col-md-12">
            <div class="panel panel-default">



                <div class="panel-body">
                    {{--{{dd($best_video)}}--}}
                    <div>
                    <h5 class="background white">
                        <span>Nieuwste videos</span>
                    </h5>
                        {{--@foreach($categories as $category)--}}
                            {{--<a class="btn btn-default" href="{{ URL::route('video_categories_sub', str_replace(' ', '-', $category->name) ) }}">{{ $category->name  }}</a>--}}
                        {{--@endforeach--}}
                    </div>

                        @foreach($video as $vid )
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                    <!--/{{$vid->thumbnails}}--> 
                                    <div class="thumbnail img-thumb-bg" style="background-image: url('<?php $cijfer = rand(0, 1); if($cijfer == 1) { echo "http://lorempixel.com/400/200/sports/"; }else{echo "https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=150";} ?>')">
                                        <div class="overlay"></div>
                                        <div class="caption">
                                            <div class="tag">  
                                                <a href="{{URL::route('video_show', $vid->video_key)}}">
                                                    <?php $cijfer = rand(0, 1); if($cijfer == 1) { echo "Video"; }else{echo "Cursus";} ?>
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="{{URL::route('video_show', $vid->video_key)}}">{{$vid->name}}</a>
                                            </div>
                                            <div class="clearfix">
                                               <span class="meta-data">By <a href="">AUTEUR NAAM</a> on DATUM</span>
                                               <span class="meta-data pull-right"><a href=""><i class="fa fa-heart-o"></i> 9</a></span>
                                            </div>
                                            <div class="content">
                                               <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco.
                                               </p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                        </div>
                    </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                    <h5 class="background white">
                        <span>EEN LABEL</span>
                    </h5>
                        @foreach($video as $vid )
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <img src="/{{$vid->thumbnails}}" alt="">
                                    <div class="caption">
                                        <h3>{{$vid->name}}</h3>
                                        <p>...</p>
                                        <p> <a class="btn btn-default" href="{{URL::route('video_show', $vid->video_key)}}">show video</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


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