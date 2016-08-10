@extends('layouts.admin')

@section('title', 'user')
@section('breadcrumb', Breadcrumbs::render('dashboard.author.edit'))

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive">
                <div class="panel panel-default">
                    <div class="panel-heading">edit</div>

                    <div class="panel-body">

                        @include('errors.message')

                        {{--{!! Form::model($user, array('route' => 'admin_authors_update', 'method' => 'patch')) !!}--}}

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('voornaam', 'voornaam') !!}--}}
                        {{--{!! Form::text('voornaam', null, ['class' => 'form-control']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('tussenvoegsel', 'tussenvoegsel') !!}--}}
                        {{--{!! Form::text('tussenvoegsel', null, ['class' => 'form-control']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('achternaam', 'achternaam') !!}--}}
                        {{--{!! Form::text('achternaam', null, ['class' => 'form-control']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('geslacht', 'geslacht') !!}<br>--}}
                        {{--<label>male</label> {!! Form::radio('geslacht', 'male') !!}<br>--}}
                        {{--<label>female</label> {!! Form::radio('geslacht', 'female') !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('land', 'land') !!}--}}
                        {{--{!! Form::text('land', null, ['class' => 'form-control']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('stad', 'stad') !!}--}}
                        {{--{!! Form::text('stad', null, ['class' => 'form-control']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('postcode', 'postcode') !!}--}}
                        {{--{!! Form::text('postcode', null, ['class' => 'form-control']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('straatnaam', 'straatnaam') !!}--}}
                        {{--{!! Form::text('straatnaam', null, ['class' => 'form-control']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('huisnummer', 'huisnummer') !!}--}}
                        {{--{!! Form::text('huisnummer', null, ['class' => 'form-control']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('geboortedatum', 'geboortedatum') !!}--}}
                        {{--{!! Form::text('geboortedatum', null, array('id' => 'datepicker', 'class' => 'form-control')) !!}--}}
                        {{--</div>--}}

                        {{--{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}--}}

                        {{--<a href="{{ URL::route('admin_profile_all') }}" class="btn btn-default">terug</a>--}}

                        {!! Form::close() !!}

                        {{----}}
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
