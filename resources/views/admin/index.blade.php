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
                    <div class="panel-heading">Welcome to the admin panel</div>

                    <div class="panel-body">

                        @include('layouts.menus.admin_menu')

                        <p>stats van videos, categorieen, users, authors</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')

@endsection