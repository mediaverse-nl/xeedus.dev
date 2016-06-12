@extends('layouts.app')

@section('title')
    video editing
@endsection

@section('description')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">profile edit</div>

                <div class="panel-body">

                    @include('layouts.menus.author_profile_menu')

                    @include('errors.message')

                    {!! Form::model($author, array('route' => 'author_profile_update')) !!}

                        <div class="form-group">
                            {!! Form::label('biography', 'biography') !!}
                            {!! Form::textarea('biography', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('bank_credentials', 'bank_credentials') !!}
                            {!! Form::text('bank_credentials', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('bank_number', 'bank_number') !!}
                            {!! Form::text('bank_number', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('thumbnail', 'thumbnail') !!}
                            <img src="">
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