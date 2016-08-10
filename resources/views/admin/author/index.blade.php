@extends('layouts.admin')

@section('title', 'categories')
@section('breadcrumb', Breadcrumbs::render('dashboard.author'))

@section('content')

    <div class="row">
        <div class="col-lg-10">
            <div class="table-responsive">
                <table class="table table-condensed table-bordered table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nr</th>
                            <th>username</th>
                            <th>email</th>
                            <th>credits</th>
                            <th>status</th>
                            <th>verified</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $user)
                            <tr class="table-row"data-href="{{URL::route('admin_authors_show', $user->id)}}">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->user->name }}</td>
                                <td>{{ $user->user->email }}</td>
                                <td>{{ $user->credit_bank }}</td>
                                <td>{{ $user->status }}</td>
                                <td>{{ $user->verified }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>

        <div class="col-lg-2 pull-right">
            <ul class="list-group">
                {{--<li class="list-group-item"><a href="{{route('admin_category_create')}}">new</a></li>--}}
            </ul>
        </div>

    </div>

@endsection

@section('javascript')

@endsection