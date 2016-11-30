@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">

            @include('layouts.menus.__author')


            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Author profile panel</div>

                    <div class="panel-body">

                        {{$author}}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
