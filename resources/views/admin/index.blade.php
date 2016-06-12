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

                        <a href="{{ URL::route('admin_profile_all') }}" class="btn btn-default">users</a>
                        <a href="{{ URL::route('admin_authors_all') }}" class="btn btn-default">authors</a>
                        <a href="" class="btn btn-default">videos</a>
                        <a href="{{ URL::route('admin_category_all') }}" class="btn btn-default">categorieen</a>
                        <a></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')

@endsection