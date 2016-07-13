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

                        <style>
                            table, th, td {
                                border: 1px solid black;
                                padding: 10px;
                            }
                        </style>

                        <table class="table table-condensed table-bordered table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nr</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>role</th>
                                    <th>credits</th>
                                    <th>joined at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="table-row"data-href="{{URL::route('admin_user_edit', $user->id)}}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->credits }}</td>
                                        <td>{{ $user->created_at }}</td>
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

    <script type="text/javascript">
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>

@endsection