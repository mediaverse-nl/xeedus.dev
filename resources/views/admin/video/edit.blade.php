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

                        @include('errors.message')

                        {!! Form::model($cate, array('route' => 'admin_category_update', 'method' => 'patch', 'method' => 'patch')) !!}

                            {!! Form::hidden('id', $cate->id) !!}

                            {!! Form::label('name', 'name') !!}
                            {!! Form::text('name') !!}
                            <br>
                            {!! Form::submit('edit category', ['class' => 'btn btn-primary'])!!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')

@endsection