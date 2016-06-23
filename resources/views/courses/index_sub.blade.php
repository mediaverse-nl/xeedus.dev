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
                    <div class="panel-heading">Sub categories</div>

                    <div class="panel-body">

                        <div class="col-lg-12">

                            <h1>{{$category->name}}</h1>
                            @foreach($category->children as $child)
                                <br>
                                <a href="{{ URL::route('video_categories_sub', str_replace(' ', '-', $child->name)) }}">{{$child->name}}</a>
                            @endforeach

                            {{--<div class="col-lg-9">--}}
                                {{--@foreach($category->children as $video)--}}
                                    {{--@foreach($video->video as $vid)--}}
                                        {{--<div class="col-lg-12" style="margin-bottom: 20px; border: 1px solid">--}}
                                            {{--<div class="col-lg-3" style="border: 1px solid; height: 150px;">--}}
                                                {{--<span>img</span>--}}
                                                {{--{{$vid->thumbnails}}--}}
                                            {{--</div>--}}
                                            {{--<div class="col-lg-9">--}}
                                                {{--<label>titel: </label>--}}
                                                {{--<head>{{$vid->name}}</head><br>--}}
                                                {{--<label>description</label>--}}
                                                {{--<p>{{$vid->beschrijving}}</p>--}}
                                                {{--<label>price: </label><span>{{$vid->prijs}}</span>--}}
                                                {{--<label>level: </label><span>{{$vid->level}}</span>--}}
                                                {{--<label>author: </label><span> <a href="{{ URL::route('author_show', $vid->author->user->name) }}"> {{$vid->author->user->name}}</a></span>--}}
                                                {{--<a href="{{ URL::route('video_show', $vid->video_key) }}" class="btn btn-primary pull-right">Show</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<hr>--}}
                                    {{--@endforeach--}}
                                {{--@endforeach--}}
                            {{--</div>--}}

                            {{--@foreach()--}}

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