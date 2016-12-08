@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <style>
                .star{
                    font-size: 20px !important;
                }
                .clear-rating{
                    font-size: 20px !important;
                }
            </style>
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
                                    @if ($item->order->where('user_id', Auth::user()->id)->first())
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
                                    @if ($item->order->where('user_id', Auth::user()->id)->first())
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
                        <label>price: </label><span>{{$video->prijs == 0 ? 'free video' : $video->prijs}}</span>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <label>level: </label><span>{{$video->level}}</span>&nbsp;&nbsp;|&nbsp;&nbsp;
{{--                        <label>average rating: </label><span>{{number_format($video->author->review->where('video_key', Request::segment(2))->avg('rating'), 1)}}</span>&nbsp;&nbsp;|&nbsp;&nbsp;--}}
                        <label>author: </label><span><a href="{{URL::route('author_show', $video->author->user->name)}}">{{$video->author->user->name}}</a></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                        @if($status != true)
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

                        @if($status === true || $video->prijs === 0)
                            @if(empty($review))
                            <div class="row">

                                {!! Form::open(['route' => ['review_store', $video->video_key]]) !!}

                                    <div class="form-group col-sm-9">
                                        <h3>Reviews</h3>
                                        {!!Form::textarea('tekst', null, array('class' => 'form-control', 'cols' => '20', 'rows' => '5'))!!}
                                        <br>
                                        {!!Form::submit('send', array('class' => 'btn btn-primary'))!!}
                                    </div>
                                    <div class="form-group col-sm-3">
                                        {!! Form::label('rating_1') !!}
                                        {!! Form::number('rating_1', null, array('class' => 'rating input-id', 'data-size' => 'xs'))!!}
                                        {!! Form::label('rating_2')!!}
                                        {!! Form::number('rating_2', null, array('class' => 'rating input-id', 'data-size' => 'xs'))!!}
                                        {!! Form::label('rating_3')!!}
                                        {!! Form::number('rating_3', null, array('class' => 'rating input-id', 'data-size' => 'xs'))!!}
                                    </div>

                                {{Form::close()}}

                            </div>
                        @endif
                    @endif

                    <hr>

                    @foreach($video->review as $review)
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="thumbnail">
                                   <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                </div><!-- /thumbnail -->
                            </div><!-- /col-sm-1 -->

                            <div class="col-sm-11">
                                <div class="panel panel-default">
                                   <div class="panel-heading">

                                       <strong>{{$review->user->name}}</strong>
                                       <span class="text-muted">commented {{$review->created_at}}</span>

                                   </div>
                                   <div class="panel-body">
                                       <div class="col-sm-12">
                                           <div class="col-sm-1">
                                               <label class="pull-left">rating_1</label>
                                           </div>
                                           <div class="col-sm-3" style="margin-top: -15px;">
                                               <input class="rating input-display" value="{{$review->rating_1}}" name="rating_1" type="text" data-size="xs" data-min="0.5" data-max="10" data-step="0.5" >
                                           </div>
                                           <div class="col-sm-1">
                                               <label>rating_1</label>
                                           </div>
                                           <div class="col-sm-3" style="margin-top: -15px;">
                                               <input class="rating input-display" value="{{$review->rating_1}}" name="rating_1" type="text" data-size="xs" data-min="0.5" data-max="10" data-step="0.5" >
                                           </div>
                                           <div class="col-sm-1">
                                               <label class="pull-left">rating_1</label>
                                           </div>
                                           <div class="col-sm-3" style="margin-top: -15px;">
                                               <input class="rating input-display" value="{{$review->rating_1}}" name="rating_1" type="text" data-size="xs" data-min="0.5" data-max="10" data-step="0.5" >
                                           </div>
                                       </div>
                                       <hr>
                                       {{$review->tekst}}
                                   </div><!-- /panel-body -->
                                </div><!-- /panel panel-default -->
                            </div><!-- /col-sm-5 -->
                        </div><!-- /row -->
                    @endforeach

                </div>

            </div>

        </div>

    </div>
</div>

@stop

@push('javascript')

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

    $(".input-id").rating({'showCaption':false, 'stars':'5', 'min':'0', 'max':'10', 'step':'1', 'size':'xs'});
    $(".input-display").rating({'displayOnly':true, 'size':'xs'});

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
        }};
    }();

</script>
@endpush