@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="col-lg-3">
                            <img class="img-responsive img-circle" src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png">
                        </div>

                        <div class="col-xs-9">
                            <h1>{{$author->user->name}}</h1>
                            <p>{{$author->biography}}</p>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">

                        @foreach($author->video as $video)
                            <div class="col-lg-12" style="margin-bottom: 20px;">
                                <a href="{{route('video_show', $video->video_key)}}">
                                    <div class="col-lg-4">
                                        <img class="" width="300" height="170" src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png">
                                    </div>
                                    <div class="col-lg-8">
                                        <h2>{{$video->name}}</h2>
                                        <p>{{$video->beschrijving}}</p>
                                        <div>
                                            <span>level</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </div>
    </div>

@stop
