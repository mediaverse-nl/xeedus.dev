@extends('layouts.app')

@section('title')
    allo
@endsection

@section('description')
    Here is you description. You can else echo content and use your foreach in here.
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">sign up for are partner programm</div>

                    <div class="panel-body">

                        @include('layouts.menus.author_menu')

                        @include('errors.message')

                        @foreach($videos as $video)
                            <br>
                            <br>
                            {{$video}}
                            {{$video->category->name}}<br>
                            <a href="{{ URL::route('author_video_show', $video->video_key) }}" class="btn btn-default">preview</a>
                            <a href="{{ URL::route('author_video_edit', $video->video_key) }}" class="btn btn-default">edit</a>
                            <a href="{{ URL::route('author_video_destroy', $video->video_key) }}" class="btn btn-default">delete</a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection