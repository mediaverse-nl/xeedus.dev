@extends('layouts.app')

@section('title')
    profile
@endsection

@section('description')

@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {!! Breadcrumbs::render('profile.orders') !!}
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
                                    <th>id</th>
                                    <th>date</th>
                                    <th>total</th>
                                    <th>status</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->order_id}}</td>
                                        <td>{{date_format($order->created_at, "Y/m/d")}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>€ {{number_format($order->price, 2)}}</td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target=".myModal-{{$order->id}}">details</button>
                                            <!-- Modal -->
                                            <div class="modal fade myModal-{{$order->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Order Nr #{{$order->id}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>price: {{number_format($order->price, 2)}}</p>
                                                            <p>credits: {{$order->credits}}</p>
                                                            <p>status: {{$order->status}}</p>
                                                            <p>created_at: {{date_format($order->created_at, "Y/m/d")}}</p>
                                                            <p>updated_at: {{date_format($order->updated_at, "Y/m/d")}}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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