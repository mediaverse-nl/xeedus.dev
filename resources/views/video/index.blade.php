@extends('layouts.app')

@section('title')
    allo
@endsection

@section('description')

@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Author profile panel</div>

                    <div class="panel-body">

                        <div class="col-lg-12">
                            <div class="col-lg-12" style="margin-bottom: 20px; border: 1px solid">
                                {{--<div class="col-lg-3" style="border: 1px solid; height: 150px;">--}}

                                {{--</div>--}}
                                <div class="col-lg-9">
                                    <div class="col-lg-12">
                                        <img style="width: 100%; height: 400px;" class="img-responsive" src="/videos/thumbnails/{{$video->thumbnails}}">
                                    </div>
                                    <h1>{{$video->name}}</h1><br>
                                    <label>description</label>
                                    <p>{{$video->beschrijving}}</p>
                                    <label>price: </label><span>{{$video->prijs}}</span>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <label>level: </label><span>{{$video->level}}</span>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <label>average rating: </label><span>{{number_format($video->review->avg('rating'), 1)}}</span>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <label>author: </label><span><a href="{{URL::route('author_show', $video->author->user->name)}}">{{$video->author->user->name}}</a></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    {{--<a href="{{ URL::route('video_show', $video->video_key) }}" class="btn btn-primary pull-right">Show</a>--}}
                                    @if($status)
                                        show video
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

                                                       video ke {{$video->video_key}}
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

                                </div>
                            </div>
                        </div>
{{--{{list($orders)}}--}}
                        <div class="col-lg-12">
                            <div class="col-lg-4">
                                <h3>video list</h3>
                                @foreach($list as $item)
                                    @if($item->video_key == Request::segment(2))
                                        <a style="color: greenyellow" href="{{URL::route('video_show', $item->video_key)}}">{{$item->name}}</a>
                                    @else
                                        @if($item->prijs == 0)
                                            <a style="color: darkgreen;" href="{{URL::route('video_show', $item->video_key)}}">{{$item->name}}</a> free video
                                        @else
                                            {{--@if (in_array($item->id, $orders))--}}
                                            {{--<a href="{{URL::route('video_show', $item->video_key)}}">{{$item->name}}</a> paid--}}
                                            {{--@else--}}
                                            <a href="{{URL::route('video_show', $item->video_key)}}">{{$item->name}}</a> buy
                                            {{--@endif--}}
                                        @endif
                                    @endif
                                    <br>
                                @endforeach
                            </div>
                            <div class="col-lg-8">

                                @foreach($video->review as $review)
                                    <div>
                                        <h3 class="">{{$review->user->name}}</h3>
                                        <p class="pull-right">rating: {{$review->rating}}</p>
                                        <p>{{$review->tekst}}</p>

                                    </div><hr>

                                @endforeach

                                @include('errors.message')
                                <h3>Reviews</h3>
                                @if(Auth::check())

                                    {!! Form::open(array('route' => array('review_store'), 'method' => 'PATCH' )) !!}

                                        {!! Form::hidden('segment', Request::segment(2)) !!}
                                        <label for="input-1" class="control-label">Rate This</label>
                                        <input id="input-1" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="1">

                                        <div class="form-group">
                                            {!! Form::label('tekst', 'Review') !!}
                                            {!! Form::textarea('tekst', null, ['class' => 'form-control']) !!}
                                        </div>

                                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

                                        <a href="{{ URL::route('video_show', Request::segment(2)) }}" class="btn btn-default">terug</a>

                                    {!! Form::close() !!}

                                @else
                                    You must be logged in to post a review
                                @endif
                            </div>
                        </div>

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
    </script>
@endsection