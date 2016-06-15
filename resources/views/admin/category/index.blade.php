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

                        @foreach ($categories as $category)
                            <ul>
                                <li>{{$category->name}} {{ $category->video->count()}} <a href="{{ URL::route('admin_category_edit', str_replace(' ', '-', $category->name)) }}"><span class="label label-default">edit</span></a></li>
                                <ul>
                                    @foreach ($category->children as $child)
                                        <li>{{ $category->id }} - {{ $child->name }} <a href="{{ URL::route('admin_category_edit', str_replace(' ', '-', $child->name)) }}"><span class="label label-default">edit</span></a></li>
                                    @endforeach
                                </ul>
                            </ul>
                        @endforeach
                        <a class="btn btn-primary" href="{{URL::route('admin_category_create')}}">new category</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')

@endsection