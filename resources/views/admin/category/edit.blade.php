@extends('layouts.admin')

@section('title', 'videos')
@section('breadcrumb', Breadcrumbs::render('dashboard.category.edit'))

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive">
                <div class="panel panel-default">
                    <div class="panel-heading">category</div>

                    <div class="panel-body">

                        @include('errors.message')

                        {!! Form::model($cate, array('route' => 'admin_category_update', 'method' => 'patch', 'method' => 'patch')) !!}

                        {!! Form::hidden('id', $cate->id) !!}

                        <!-- name -->
                        <div class="form-group">
                            {!! Form::label('name', 'name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>

                        {!! Form::submit('edit', ['class' => 'btn btn-primary pull-right'])!!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
