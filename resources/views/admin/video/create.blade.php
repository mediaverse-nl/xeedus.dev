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

                        {!! Form::open(['route' => 'admin_category_store']) !!}

                        {!! Form::label('name', 'name') !!}
                        {!! Form::text('name') !!}
    <br>
                        {!! Form::Label('cate_id', 'cate_id:') !!}

                            <select class="cate_id" name="cate_id">
                                <option value="0">main</option>
                                @foreach($categories as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                @endforeach
                            </select>

                        {!! Form::submit('submit')!!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')

@endsection