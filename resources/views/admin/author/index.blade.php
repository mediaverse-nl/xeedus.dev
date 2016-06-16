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

                        <a class="btn btn-primary" href="{{ URL::route('admin_authors_requests') }}">requests</a>

                        <br>
                        <br>

                        <style>
                            table, th, td {
                                border: 1px solid black;
                                padding: 10px;
                            }
                        </style>

                        <a></a>

                        <table>
                            <tbody>
                                <tr>
                                    <th>Nr</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>voornaam</th>
                                    <th>achternaam</th>
                                    <th>postcode</th>
                                    <th>huisnummer</th>
                                </tr>
                                @foreach($authors as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->user->name }}</td>
                                        <td>{{ $user->user->email }}</td>
                                        <td>{{ $user->user->voornaam }}</td>
                                        <td>{{ $user->user->achternaam }}</td>
                                        <td>{{ $user->user->postcode }}</td>
                                        <td>{{ $user->user->huisnummer }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>
                                            @if($user->status == 'verified')
                                                <a href="" class="btn btn-danger">unverified</a>
                                            @else
                                                <a href="" class="btn btn-success">verified</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection