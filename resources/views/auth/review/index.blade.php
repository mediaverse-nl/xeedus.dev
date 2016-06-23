@extends('layouts.app')

@section('title')
    profile
@endsection

@section('description')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My reviews</div>

                <div class="panel-body">

                    @include('layouts.menus.user_menu')

                    <div class="col-lg-9">

                        @include('errors.message')

                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">My reviews</div>
                            <div class="panel-body">
                                <p>Er zijn vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel heeft te lijden gehad van wijzigingen in een of andere vorm, door ingevoegde humor of willekeurig gekozen woorden die nog niet half geloofwaardig ogen. Als u een passage uit Lorum Ipsum gaat gebruiken dient u zich ervan te verzekeren dat er niets beschamends midden in de tekst verborgen zit. Alle Lorum Ipsum generators op Internet</p>
                            </div>

                            <!-- Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>video</th>
                                        <th>author</th>
                                        <th>rating</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reviews as $review)
                                        <tr>
                                            <td>{{$review->id}}</td>
                                            <td>{{$review->video->video_key}}</td>
                                            <td>{{$review->video->author->user->name}}</td>
                                            <td>{{$review->rating}}</td>
                                            <td><a class="btn btn-default btn-xs">edit</a> <a class="btn btn-default btn-xs">show</a></td>

                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')

    <script type="text/javascript">
        $(document).ready(function () {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 1000);
        });
    </script>

@endsection