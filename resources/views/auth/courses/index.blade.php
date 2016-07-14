@extends('layouts.app')

@section('title')
    allo
@endsection

@section('description')

@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {!! Breadcrumbs::render('profile.courses') !!}
            </div>

            @include('layouts.menus.user_menu')

            <div class="col-lg-9">
                @include('errors.message')

                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><h3 class="panel-title">My orders</h3></div>
                    <div class="panel-body">
                        <p>Er zijn vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel heeft te lijden gehad van wijzigingen in een of andere vorm, door ingevoegde humor of willekeurig gekozen woorden die nog niet half geloofwaardig ogen. Als u een passage uit Lorum Ipsum gaat gebruiken dient u zich ervan te verzekeren dat er niets beschamends midden in de tekst verborgen zit. Alle Lorum Ipsum generators op Internet</p>
                    </div>

                    <!-- Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>date</th>
                                <th>author</th>
                                <th>title</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{date_format($order->created_at, "Y/m/d")}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->video->name}}</td>
                                <td><a href="{{URL::route('video_show', $order->video->video_key)}}" class="btn btn-default btn-xs">show</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script type="text/javascript">
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
    <script type="text/javascript">
        <!--

        $(document).ready(function () {

            window.setTimeout(function() {
                $(".alert").fadeTo(1500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 5000);

        });
        //-->
    </script>
@endsection