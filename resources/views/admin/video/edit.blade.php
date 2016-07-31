@extends('layouts.admin')

@section('title', 'edit')
@section('breadcrumb', Breadcrumbs::render('dashboard.videos.edit', $video->id))

@section('content')

    <div class="row">

        {!! Form::model($video, array('route' => array('admin_videos_update', $video->id), 'class' => '', 'method' => 'post', 'files'=> true )) !!}

            <div class="col-lg-6">

                @include('errors.message')

                <fieldset>

                    <!-- id -->
                    <div class="form-group">
                        {!! Form::label('id', 'id') !!}
                        {!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                    </div>

                    <!-- username -->
                    <div class="form-group">
                        {!! Form::label('author_id', 'author') !!}
                        {!! Form::text('author_id', $video->author->user->name, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                    </div>

                    <!-- category id -->
                    <div class="form-group">
                        {!! Form::label('cate_id', 'category') !!}
                        {!! Form::select('category_id', \App\Category::where('cate_id', '!=', 0)->pluck('name', 'id'), null, ['class' => 'form-control'] ) !!}
                    </div>

                    <!-- name -->
                    <div class="form-group">
                        {!! Form::label('name', 'name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>

                    <!-- video_key -->
                    <div class="form-group">
                        {!! Form::label('video_key', 'video key') !!}
                        {!! Form::text('video_key', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                    </div>

                    <!-- prijs -->
                    <div class="form-group">
                        {!! Form::label('prijs', 'prijs') !!}
                        {!! Form::number('prijs', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>

                    <!-- created_at -->
                    <div class="form-group">
                        {!! Form::label('created_at', 'created_at') !!}
                        {!! Form::text('created_at', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                    </div>
                    <!-- updated_at -->
                    <div class="form-group">
                        {!! Form::label('updated_at', 'updated_at') !!}
                        {!! Form::text('updated_at', null, ['class' => 'form-control', 'placeholder' => '', 'disabled']) !!}
                    </div>

                    <!-- prijs -->
                    <div class="form-group">
                        {!! Form::label('level', 'level') !!}<br>

                        {!! Form::radio('level', 1) !!}

                        {!! Form::label('level', 'beginner') !!}
                        {!! Form::radio('level', 'beginner') !!}
                        {!! Form::label('level', 'intermediate') !!}
                        {!! Form::radio('level', 'advanced') !!}
                        {!! Form::label('level', 'advanced') !!}
                        {!! Form::radio('level', 'expert') !!}
                        {!! Form::label('level', 'expert') !!}
                    </div>

                    <!-- beschrijving -->
                    <div class="form-group">
                        {!! Form::label('beschrijving', 'beschrijving') !!}
                        {!! Form::textarea('beschrijving', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>

                    <!-- status -->
                    <div class="form-group">
                        {!! Form::label('status', 'status') !!}
                        {!! Form::select('status', \App\Video::lists('status', 'status'), null, ['class' => 'form-control'] ) !!}
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary pull-right'] ) !!}
                    </div>

                </fieldset>

            </div>

            <div class="col-lg-2">
                {{--<img src="{{route('get_thumbnail', $video->thumbnails)}}">--}}
                <video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
                       poster="{{route('get_thumbnail', $video->thumbnails)}}" data-setup="{}">
                    {{--<source src="http://vjs.zencdn.net/v/oceans.mp4" type='video/mp4'>--}}
                    <source src="{{route('get_video', $video->video_key)}}" type='video/mp4'>
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
                {{--<script src="http://vjs.zencdn.net/5.10.4/video.js"></script>--}}

                {{--@if(Storage::disk('local')->has($video->thumbnails))--}}
                    {{--<img src="{{route('get_thumbnail', $video->thumbnails)}}" alt="ALT NAME" class="img-responsive" />--}}
                {{--@endif--}}

                <!-- thumbnails -->
                <div class="form-group">
                    {!! Form::label('thumbnails', 'thumbnails') !!}
                    {!! Form::file('thumbnails') !!}
                </div>

                <!-- thumbnails -->
                <div class="form-group">
                    {!! Form::label('video', 'video') !!}
                    {!! Form::file('video') !!}
                </div>


            </div>

        {!! Form::close()  !!}

    </div>

@endsection

@section('javascript')

@endsection