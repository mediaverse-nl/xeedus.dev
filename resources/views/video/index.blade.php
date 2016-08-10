@extends('layouts.app')

@section('title')
    allo
@endsection

@section('description')

@stop

@section('content')
    <div class="container">
        <div class="row">

            @include('errors.message')

            <div class="col-md-12">
                <div class="row">

                    <div class="video-wrapper">
                        <div class="video-container">
                            {{--<source src="http://vjs.zencdn.net/v/oceans.mp4" type='video/mp4'>--}}
                            @if($status === true || $video->prijs === 0)
                                <video id="my-video" class="video-js" controls preload="auto" style="width: 100%; height: 100%;"
                                       poster="{{'/videos/thumbnail/'.$video->thumbnails}}" data-setup="{}">
                                    <source src="{{route('get_video', $video->video_key)}}" type='video/mp4'>
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                </video>
                            @else
                                <img style="height: 100%; width: 100%;" src="{{'/videos/thumbnail/'.$video->thumbnails}}">
                            @endif
                                    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <h3>video list</h3>
                        {{--{{dd($orders->video_id)}}--}}
                        @foreach($list as $item)
                            @if($item->video_key == Request::segment(2))
                                @if($item->prijs == 0)
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <a style="color: darkgreen;" href="{{route('video_show', $item->video_key)}}">{{$item->name}}</a>
                                @else
                                    @if ($item->order->first())
                                        <i class="fa fa-archive" aria-hidden="true"></i>
                                        <a style="color: darkgreen;" href="{{route('video_show', $item->video_key)}}">{{$item->name}}</a>
                                    @else
                                        <i class="fa fa-eur" aria-hidden="true"></i>
                                        <a style="color: darkgreen;" href="{{route('video_show', $item->video_key)}}">{{$item->name}}</a>
                                    @endif
                                @endif
                            @else
                                @if($item->prijs == 0)
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <a href="{{route('video_show', $item->video_key)}}">{{$item->name}}</a>
                                @else
                                    @if ($item->order->first())
                                        <i class="fa fa-archive" aria-hidden="true"></i>
                                        <a href="{{route('video_show', $item->video_key)}}">{{$item->name}}</a>
                                    @else
                                        <i class="fa fa-eur" aria-hidden="true"></i>
                                        <a href="{{route('video_show', $item->video_key)}}">{{$item->name}}</a>
                                    @endif
                                @endif
                            @endif
                        <br>
                        @endforeach
                    </div>

                    <div class="col-lg-9">
                        <h1>{{$video->name}}</h1><br>
                        <label>description</label>
                        <p>{{$video->beschrijving}}</p>
                        <label>price: </label><span>{{$video->prijs}}</span>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <label>level: </label><span>{{$video->level}}</span>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <label>average rating: </label><span>{{number_format($video->author->review->where('video_key', Request::segment(2))->avg('rating'), 1)}}</span>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <label>author: </label><span><a href="{{URL::route('author_show', $video->author->user->name)}}">{{$video->author->user->name}}</a></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                        @if($status === true || $video->prijs === 0)
                            @if($video->prijs === 0)
                                free video
                            @else
                                buy it now
                            @endif
                        @else
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <br>
                                            <label>name</label>{{$video->name}}<br>
                                            <label>prijs</label>{{$video->prijs}}<br>
                                            <label>level</label>{{$video->level}}<br>
                                            <label>author</label>{{$video->author->user->name}}<br>
                                            <label>categorie</label>{{$video->category->name}}<br>

                                           video key {{$video->video_key}}
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::open(array('route' => array('order_store', $video->video_key) )) !!}
                                                {{ Form::hidden('video_key', $video->video_key) }}
                                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">buy video</button>

                        @endif

                        {{--@foreach($video->review as $review)--}}
                            {{--<div class="row">--}}
                                {{--{{$review->user->id}}--}}
                            {{--</div>--}}
                            {{--<hr>--}}
                        {{--@endforeach--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
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


        var adManager = function () {
            var vid = document.getElementById("myVid"),
                    adSrc = "videos/epic_rap_battles_of_history_16_adolf_hitler_vs_darth_vader_2_1280x720.mp4",
                    src;

            var adEnded = function () {
                vid.removeEventListener("ended", adEnded, false);
                vid.src = src;
                vid.load();
                vid.play();
            };

            return {
                init: function () {
                    src = vid.src;
                    vid.src = adSrc;
                    vid.load();
                    vid.addEventListener("ended", adEnded, false);
                }
            };
        }();

    </script>
@endsection