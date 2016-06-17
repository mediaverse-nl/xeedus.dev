@extends('layouts.app')

@section('title')
   admin - all users
@endsection

@section('description')
    Here is you description. You can else echo content and use your foreach in here.
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">admin all users</div>

                    <div class="panel-body">

                        @include('layouts.menus.admin_menu')

                        @include('errors.message')

                        {!! Form::model($author, array('route' => 'admin_authors_update', 'method' => 'patch')) !!}

                            {!! Form::hidden('id') !!}

                            {!! Form::label('biography', 'biography') !!}
                            {!! Form::textarea('biography', null,  ['class' => 'form-control']) !!}
                            <br>

                            {!! Form::label('bank_credentials', 'bank_credentials') !!}
                            {!! Form::text('bank_credentials', null,  ['class' => 'form-control']) !!}
                            <br>

                            {!! Form::label('bank_number', 'bank number') !!}
                            {!! Form::text('bank_number', null,  ['class' => 'form-control']) !!}

                            <br>
                            {!! Form::label('verified', 'verified') !!}
                            {!! Form::checkbox('verified', null, null, array('id'=>'asap', 'data-toggle' => 'toggle')) !!}
                            <br>
                        <hr>
                            {!! Form::submit('save changes', ['class' => 'btn btn-primary'])!!}
                            <a class="btn btn-default" href="{{URL::route('admin_authors_all')}}">back</a>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection