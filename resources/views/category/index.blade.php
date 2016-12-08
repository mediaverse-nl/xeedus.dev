@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <h1>{{$categories->name}}</h1>
                @foreach($categories->children as $child)
                    <div class="col-lg-3">
                        <a href="{{ route('video_index', [str_replace(' ','-', $child->parent->name),str_replace(' ','-', $child->name),$child->id]) }}">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    {{$child->name}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection

@push('javascript')

@endpush