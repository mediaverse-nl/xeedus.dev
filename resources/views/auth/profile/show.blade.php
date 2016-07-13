@extends('layouts.app')

@section('title')
    profile
@endsection

@section('description')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                {!! Breadcrumbs::render('profile') !!}

                <div class="panel-body">

                    @include('layouts.menus.user_menu')

                    <div class="col-lg-9">
                        @include('errors.message')

                        <table>
                            <tr>
                                <td><label>username</label></td>
                                <td><span>{!! $user->name !!}</span></td>
                            </tr>
                            <tr>
                                <td><label>email</label></td>
                                <td><span>{!! $user->email !!}</span></td>
                            </tr>
                            <tr>
                                <td><label>voornaam</label></td>
                                <td><span>{!! $user->voornaam !!}</span></td>
                            </tr>
                            <tr>
                                <td><label>tussenvoegsel</label></td>
                                <td><span>{!! $user->tussenvoegsel !!}</span></td>
                            </tr>
                            <tr>
                                <td><label>achternaam</label></td>
                                <td><span>{!! $user->achternaam !!}</span></td>
                            </tr>
                            <tr>
                                <td><label>geslacht</label></td>
                                <td><span>{!! $user->geslacht !!}</span></td>
                            </tr>
                            <tr>
                                <td><label>land</label></td>
                                <td><span>{!! $user->land !!}</span></td>
                            </tr>
                            <tr>
                                <td><label>stad</label></td>
                                <td><span>{!! $user->stad !!}</span></td>
                            </tr>
                            <tr>
                                <td><label>postcode</label></td>
                                <td><span>{!! $user->postcode !!}</span></td>
                            </tr>
                            <tr>
                                <td><label>straatnaam</label></td>
                                <td><span>{!! $user->straatnaam !!}</span></td>
                            </tr>
                            <tr>
                                <td><label>huisnummer</label></td>
                                <td><span>{!! $user->huisnummer !!}</span></td>
                            </tr>
                            <tr>
                                <td><label>geboortedatum</label></td>
                                <td><span>{!! $user->geboortedatum !!}</span></td>
                            </tr>
                            <tr>
                                <td><label>created_at</label></td>
                                <td><span>{!! $user->created_at !!}</span></td>
                            </tr>
                        </table>

                        <a href="{{ url('/profile/edit') }}" class="btn btn-primary">edit</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')

    <script type="text/javascript">
        $(document).ready(function () {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 1000);
        });
    </script>

@endsection