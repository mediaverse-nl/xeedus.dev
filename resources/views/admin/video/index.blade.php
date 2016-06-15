@extends('layouts.app')

@section('title')
    admin panel index
@endsection

@section('description')

@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">categories</div>

                    <div class="panel-body">

                        @include('layouts.menus.admin_menu')

                        @foreach ($videos as $video)
                            <br>
                            {{$video->name}}
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')

@endsection