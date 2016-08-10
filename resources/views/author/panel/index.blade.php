@extends('layouts.app')

@section('title')

@endsection

@section('content')

    <div class="container">
        <div class="row">

            @include('layouts.menus.__author')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Author panel</div>

                    <div class="panel-body">

                        <a class="btn btn-default" href="{{URL::route('author_video_index')}}">my videos</a>
                        <a class="btn btn-default" href="{{URL::route('author_profile_index')}}">my biography</a>
                        <a class="btn btn-danger" href="">my statistics</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection