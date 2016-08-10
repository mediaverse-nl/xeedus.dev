@extends('layouts.app')

@section('title')
    allo
@endsection

@section('description')
    Here is you description. You can else echo content and use your foreach in here.
@stop

@section('content')

    <style>
        .circle {
            background: red;
            border-radius: 200px;
            color: white;
            height: 150px;
            font-weight: bold;
            width: 150px;
            display: table;
            margin: 20px auto;
        }
        .circle p {
            vertical-align: middle;
            display: table-cell;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">sign up for are partner programm</div>

                    <div class="panel-body">

                        <div class="row">
                            {{--<div class="col-lg-2 pull-left">--}}
                                {{--<img class="img-responsive img-circle" src="/author/{{$author->author->image}}">--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-6 pull-left">--}}
                                {{--<label>Author:</label> {{$author->name}}--}}
                                {{--<h4 id="glyphicons-glyphs">Biography:</h4>--}}
                                {{--<p>{{$author->author->biography}}</p>--}}
                                {{--<span>videos delen op facebook, twitter en google+ dit maakt de vindbaarheid beter</span>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-4 pull-right">--}}
                                {{--<div class="circle">--}}
                                    {{--<p class="text-center">Rating <br><span class="">{{array_sum(collect($reviews->avg('rating_1'), $reviews->avg('rating_2'), $reviews->avg('rating_3'))->toArray()) / count(collect($averages))}}</span></p>--}}
                                {{--</div>--}}
                                {{--<div class="col-lg-1 circle" style="width: 60px; height: 60px;">--}}
                                    {{--<p class="text-center">Rating <br><span class="">{{$reviews->avg('rating_1')}}</span></p>--}}
                                {{--</div>--}}
                                {{--<div class="col-lg-1 circle" style="width: 60px; height: 60px;">--}}
                                    {{--<p class="text-center">Rating <br><span class="">{{$reviews->avg('rating_2')}}</span></p>--}}
                                {{--</div>--}}
                                {{--<div class="col-lg-1 circle" style="width: 60px; height: 60px;">--}}
                                    {{--<p class="text-center">Rating <br><span class="">{{$reviews->avg('rating_3')}}</span></p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-lg-3">--}}
                                {{--<h3>list of videos</h3>--}}
                                {{--@foreach($videos as $video)--}}
                                    {{--<a href="{{URL::route('video_show', $video->video_key)}}">{{$video->name}}</a>--}}
                                    {{--<br>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}

                            {{--<div class="col-lg-9">--}}
                                {{--@include('errors.message')--}}
                                {{--<h3>Reviews</h3>--}}
                                {{--@if(Auth::check())--}}

                                    {{--{!! Form::open(array('route' => array('review_store'), 'method' => 'PATCH' )) !!}--}}

                                    {{--{!! Form::hidden('segment', Request::segment(2)) !!}--}}
                                    {{--<label for="rating_1" class="control-label">Rate This</label>--}}
                                    {{--<input id="input-1" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="1">--}}
                                    {{--<select name="rating_1" class="">--}}
                                        {{--<option value="1">1</option>--}}
                                        {{--<option value="2">2</option>--}}
                                        {{--<option value="3">3</option>--}}
                                        {{--<option value="4">4</option>--}}
                                        {{--<option value="5">5</option>--}}
                                    {{--</select>--}}
                                    {{--<select name="rating_2" class="">--}}
                                        {{--<option value="1">1</option>--}}
                                        {{--<option value="2">2</option>--}}
                                        {{--<option value="3">3</option>--}}
                                        {{--<option value="4">4</option>--}}
                                        {{--<option value="5">5</option>--}}
                                    {{--</select>--}}
                                    {{--<select name="rating_3" class="">--}}
                                        {{--<option value="1">1</option>--}}
                                        {{--<option value="2">2</option>--}}
                                        {{--<option value="3">3</option>--}}
                                        {{--<option value="4">4</option>--}}
                                        {{--<option value="5">5</option>--}}
                                    {{--</select>--}}
                                    {{--<div class="form-group">--}}
                                        {{--{!! Form::label('tekst', 'Review') !!}--}}
                                        {{--{!! Form::textarea('tekst', null, ['class' => 'form-control', 'rows' => '3']) !!}--}}
                                    {{--</div>--}}

                                    {{--{!! Form::submit('Submit', ['class' => 'btn btn-primary btn-sm']) !!}--}}

                                    {{--{!! Form::close() !!}--}}

                                {{--@else--}}
                                    {{--You must be logged in to post a review--}}
                                {{--@endif--}}

                                {{--<hr>--}}
                                {{--@foreach($reviews as $review)--}}
                                    {{--<div>--}}
                                        {{--<div class="row">--}}
                                            {{--<label class="col-lg-9">{{$review->user->name}}</label>--}}
                                            {{--<span class="col-lg-3">{{$review->rating_1}} / {{$review->rating_2}} / {{$review->rating_3}}</span>--}}
                                            {{--<p class="col-lg-12">{{$review->tekst}}</p>--}}
                                        {{--</div>--}}
                                    {{--</div><hr>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}

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