@extends('layouts.admin')

@section('title', 'videos')
@section('breadcrumb', Breadcrumbs::render('dashboard.videos'))

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <h2>Bordered Table</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
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
                        <tr class="table-row" data-href="{{route('admin_videos_edit', $video->id)}}">
                            <td>{{$video->id}}</td>
                            <td>{{$video->name}}</td>
                            <td>{{$video->prijs}}</td>
                            <td>
                                {{--{{$video->author->name}}--}}
                            </td>
                            <td>{{$video->order->count()}}</td>
                            <td>{{$video->order->count() * $video->prijs}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $videos->render() !!}
            </div>
        </div>

        <div class="col-lg-2 pull-right">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('admin_panel')}}">asdas</a></li>
                <li class="list-group-item"><a href="{{route('admin_panel')}}">asdas</a></li>
            </ul>
        </div>

    </div>

@endsection

@section('javascript')

@endsection