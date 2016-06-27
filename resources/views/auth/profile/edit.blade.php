@extends('layouts.app')

@section('title')
    allo
@endsection

@section('description')
    Here is you description. You can else echo content and use your foreach in here.
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">profile edit</div>

                <div class="panel-body">

                    @include('layouts.menus.user_menu')

                    <style>
                        .form-group > label{

                        }
                    </style>

                    <div class="col-md-9">

                        @include('errors.message')
                        {!! Form::model($user, array('route' => 'profile_update')) !!}

                            <div class="form-group">
                                {!! Form::label('voornaam', 'voornaam', ['class' => 'col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('voornaam', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('tussenvoegsel', 'tussenvoegsel', ['class' => 'col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('tussenvoegsel', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('achternaam', 'achternaam', ['class' => 'col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('achternaam', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('geslacht', 'geslacht', ['class' => 'col-md-4']) !!}
                                <div class="col-md-8">
                                    <label>male</label> {!! Form::radio('geslacht', 'male') !!}
                                    <label>female</label> {!! Form::radio('geslacht', 'female') !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('land', 'land', ['class' => 'col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('land', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('stad', 'stad', ['class' => 'col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('stad', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('postcode', 'postcode', ['class' => 'col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('straatnaam', 'straatnaam', ['class' => 'col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('straatnaam', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('huisnummer', 'huisnummer', ['class' => 'col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('huisnummer', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('geboortedatum', 'geboortedatum', ['class' => 'col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('geboortedatum', null, array('id' => 'datepicker', 'class' => 'form-control')) !!}
                                </div>
                            </div>

                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

                            <a href="{{ url('/profile') }}" class="btn btn-default">terug</a>

                        {!! Form::close() !!}

                    </div>
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