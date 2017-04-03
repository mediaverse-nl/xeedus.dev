@extends('layouts.app')

@section('title')
    profile
@endsection

@section('content')
<div class="container container-fix">
    <div class="row">
        <div class="col-lg-12">
            {!! Breadcrumbs::render('profile') !!}
        </div>

        @include('layouts.menus.__user')

        <div class="col-lg-9">
            @include('errors.message')

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">profile</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img class="img-responsive" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw8NDxAPDw4PDRAQDw8PDw8NDw8PDg0PFREWGBURExMYHSggGBolGxYTITEhJSkrLi4uFx8zODMsNygtLisBCgoKBQUFDgUFDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAOEA4QMBIgACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAABQYBAwQCB//EADIQAQACAAMGAwcEAgMAAAAAAAABAgMRIQQFEjFRYUFxkSIyQmKBobETIzNyUsGC0eH/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8A+lAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQA83vFdbTFY7y5N5bd+lGVcpvOfP4Y6oLExJvOdrTaesgsFt4YUfHE+WrNdvwp+OProrhmC1UxK25WifKYelTifo6cHb8WnK8zHS2oLGIzZt8ROmJHD80cvRJUtFozic4nxgGQAAAAAAAAAAAAAAAAAAAGja9rrgxnOszyrHOW+Fc3ljceLafCPZjygGva8f9S835Z8o6Q0gAAAADLp2PbLYM6a18a+H07uUBasDGriVi1Zzift2l7QG69q/TvET7lpyntPVPgAAAAAAAAAAAAAAAAAA83tlEz0iZ+yqzOevXVY9434cK89svurgMAAAAAAAAys2xYnHh0n5cp84VhP7mnPCjtMg7gAAAAAAAAAAAAAAAAAce9/4becK+su204sO8fLn6aqyAAAAAAAAAn9zR+1HnKBWPdtOHCp3jP11B0hIAAAAAAAAAAAAAAAADxj4sUra06xEax1Ve0xnOWkZ6LFvGueFfy/2rgMAAAAAAAAzCxbt2mMSkaZTWIrMeUK7Cf3Rg8GHnPO08X08AdoAAAAAAAAAAAAAAAAAPN68UTHWJhVr14ZmJ5xOS1ozee7pvPHTLP4o5Z94BCjMwwAAAAADNYz/wBA2bPh8V6162iFoiMtI8EVuvYLVn9S8ZZe7E8/NKgAAAAAAAAAAAAAAAAAAEACsbXXhxLx80/lpSW+8DhtF/C2n1hGgAAAAOjYK54tI+ZzpHcuFM4nF4VifUE5IAAAAAAAAAAAAAAAAAAABAAjd+x7FP7T+EInN+R+3H9kGAAAAAnty1/az62mUCsG6P4a+dvyDtAAAAAAAAAAAAAAAAAAAAGnG2nDw/etEduc+jhxt8x8FZnvbSPQHvfcx+nEZ68UaeOSDbMfFm8za05zP27NYAAAACc3JixNJr4xMzl1ifFBvVbTGsTMT1gFrEJs29rV0v7cdfFJ4G24eJyvET0tpOfQHQAAAAAAAAAAAABnl/6AzCP2nelKaV9ue2lfVF7Rt2Jic5yj/GukAl9p3jh4eke3bpXl9ZRe0bxxL+PBHSv/AG45YBmzAAAAAAAAAAMsAOnA23Ew+Vs4/wAbawldm3rS2l/Yn1r6oFmAWyJz1jWOsCs7PtN8P3bZducT9Eps296zpiRwT1jWsgkhit4tGcTEx1jkyAAAAATMRGc6R1kRO+9o5Yccss7d+kA2bRvetdKRxd5nKqM2ja8TE9605dI0j0aGAAAAAAAAAAAAAAAAAAAGWAG3Bx70nOtpr5cp+iS2fe/hiV/5V/OSIZgFqw8St44qzExPR6QO6NommJwzPs307RPhKfBgABXN42zxb9p4fRY1Y2qc8S8/Pb8g0gAAAAAAAAAAAAAAAAAAAAAAA9Yd+GYnpMT6LWqUrXhznWJ7R+AegAIVW85zPnK0YlsqzPSJn7KrM/kGAAAAAAAAAAAAAAAAAAAAAAAAFo2Oc8Ok/LCsLHu22eDTtGXoDpABr2j3L/1n8KuwAAAAAAAAAAAAAAAAAAAAAAAAALFur+Kv1AHWAD//2Q==" >
                        </div>
                        <div class="col-lg-8">

                            <table class="table table-user-information">
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