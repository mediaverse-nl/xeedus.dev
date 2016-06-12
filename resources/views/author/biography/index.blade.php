@extends('layouts.app')

@section('title')
    allo
@endsection

@section('description')

@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Author profile panel</div>

                    <div class="panel-body">

                        @include('layouts.menus.author_profile_menu')

                        @include('errors.message')

                        {{$author}}

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