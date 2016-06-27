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

                        {!! Form::model($user, array('route' => 'admin_authors_update', 'method' => 'patch')) !!}

                            <div class="form-group">
                                {!! Form::label('voornaam', 'voornaam') !!}
                                {!! Form::text('voornaam', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('tussenvoegsel', 'tussenvoegsel') !!}
                                {!! Form::text('tussenvoegsel', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('achternaam', 'achternaam') !!}
                                {!! Form::text('achternaam', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('geslacht', 'geslacht') !!}<br>
                                <label>male</label> {!! Form::radio('geslacht', 'male') !!}<br>
                                <label>female</label> {!! Form::radio('geslacht', 'female') !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('land', 'land') !!}
                                {!! Form::text('land', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('stad', 'stad') !!}
                                {!! Form::text('stad', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('postcode', 'postcode') !!}
                                {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('straatnaam', 'straatnaam') !!}
                                {!! Form::text('straatnaam', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('huisnummer', 'huisnummer') !!}
                                {!! Form::text('huisnummer', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('geboortedatum', 'geboortedatum') !!}
                                {!! Form::text('geboortedatum', null, array('id' => 'datepicker', 'class' => 'form-control')) !!}
                            </div>

                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

                            <a href="{{ URL::route('admin_profile_all') }}" class="btn btn-default">terug</a>

                        {!! Form::close() !!}


                    </div>
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
@endsection