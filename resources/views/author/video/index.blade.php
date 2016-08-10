@extends('layouts.app')

@section('title')

@endsection

@section('content')

    <div class="container">
        <div class="row">

            @include('layouts.menus.__author')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Videos
                        <a href="{{route('author_video_create')}}" class="btn btn-primary btn-xs pull-right">New</a>
                    </div>

                    <div class="panel-body">

                        @include('errors.message')

                        @foreach($videos as $video)
                            <div class="col-lg-12 thumbnail">
                                <div class="">
                                    <div class="col-lg-2">
                                        <img class="img-responsive" style="height: 90px; width: 150px;" src="{{'/videos/thumbnail/'.$video->thumbnails}}" />
                                        {{--<img  src="{{}}" >--}}
                                        {{--<img src="{{URL::asset('/public/videos/thumbnail/' . $video->thumbnails)}}">--}}
                                    </div>
                                    <div class="col-lg-10">
                                        <p>{{$video->name}}</p>
                                        <span class="text-muted">{{$video->created_at}}</span>
                                        <div class="pull-right">
                                            <a href="{{route('author_video_edit', $video->id)}}" class="btn btn-primary pull-right btn-xs">edit</a><br>
                                            <a href="{{ URL::route('author_video_destroy', $video->video_key) }}" class="btn btn-primary pull-right btn-xs">delete</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{--{{$video->id}}--}}
                            {{--{{$video->category->name}}<br>--}}
                            {{--<a href="{{ URL::route('author_video_show', $video->video_key) }}" class="btn btn-default">preview</a>--}}
                            {{--<a href="{{ URL::route('author_video_edit', $video->video_key) }}" class="btn btn-default">edit</a>--}}
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection