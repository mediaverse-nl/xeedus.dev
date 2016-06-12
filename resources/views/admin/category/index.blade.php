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

                        @foreach ($categories as $category)
                            <ul>
                                <li>{{$category->name}} {{ $category->video->count()}}</li>
                                <ul>
                                    @foreach ($category->children as $child)
                                        <li>{{ $category->id }} - {{ $child->name }} </li>
                                    @endforeach
                                </ul>
                            </ul>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')

@endsection