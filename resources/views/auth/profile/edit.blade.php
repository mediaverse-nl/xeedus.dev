@extends('layouts.app')

@section('title')
    profile
@endsection

@section('content')
<div class="container">
    <div class="row">
            <ol class="breadcrumb">
                {!! Breadcrumbs::render('profile.edit') !!}            
            </ol>

        @include('layouts.menus.__user')

        <div class="col-lg-9">
            @include('errors.message')

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">edit</h3>
                </div>
                <div class="panel-body">
                    {!! Form::model($user, array('route' => 'profile_update', 'class' => 'form-horizontal', 'role' => 'form')) !!}

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

@endsection

@push('javascript')

@endpush