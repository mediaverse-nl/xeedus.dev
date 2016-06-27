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

                        <table class="table-condensed table-bordered table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>price</th>
                                    <th>author</th>
                                    <th>units</th>
                                    <th>totaal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $video)
                                    <tr>
                                        <td>{{$video->id}}</td>
                                        <td>{{$video->name}}</td>
                                        <td>{{$video->prijs}}</td>
                                        <td>{{$video->author->user->name}}</td>
                                        <td>{{$video->order->count()}}</td>
                                        <td>{{$video->order->count() * $video->prijs}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')

@endsection