@extends('layouts.app')

@section('content')

    {{--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>--}}
    <!-- Add the slick-theme.css if you want default styling -->
    {{--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>--}}

    <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{--{{dd($best_video)}}--}}

                    <h1>Adaptive Streaming with HTML5</h1>
                    {{--<video style="width: 500px;" data-dashjs-player autoplay src="http://dash.edgesuite.net/envivio/EnvivioDash3/manifest.mpd" controls></video>--}}

                    <video autoplay></video>

                    <script>
                        ediaStreamTrack.getSources(function(sourceInfos) {
                            var audioSource = null;
                            var videoSource = null;

                            for (var i = 0; i != sourceInfos.length; ++i) {
                                var sourceInfo = sourceInfos[i];
                                if (sourceInfo.kind === 'audio') {
                                    console.log(sourceInfo.id, sourceInfo.label || 'microphone');

                                    audioSource = sourceInfo.id;
                                } else if (sourceInfo.kind === 'video') {
                                    console.log(sourceInfo.id, sourceInfo.label || 'camera');

                                    videoSource = sourceInfo.id;
                                } else {
                                    console.log('Some other kind of source: ', sourceInfo);
                                }
                            }

                            sourceSelected(audioSource, videoSource);
                        });

                        function sourceSelected(audioSource, videoSource) {
                            var constraints = {
                                audio: {
                                    optional: [{sourceId: audioSource}]
                                },
                                video: {
                                    optional: [{sourceId: videoSource}]
                                }
                            };

                            navigator.getUserMedia(constraints, successCallback, errorCallback);
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    {{--<script src="http://cdn.dashjs.org/latest/dash.all.min.js"></script>--}}
    <script>

    </script>

@endsection