@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">sign up for are partner programm</div>

                    <div class="panel-body">

                        @include('errors.message')

                        @if($user->role = 'user')
                            @if($check_exists)
                                @if($user->author->status == 'verified' && $user->author == 'author')
                                    your request for an author account was accepted go to your <a href="{{ URL::route('author_home') }}">panel</a> now.
                                @else
                                    your author account is waiting for the admin to accept your request
                                @endif
                            @else
                                {!! Form::open(array('route' => array('author_store'), 'files' => true )) !!}

                                    About you

                                    <div class="form-group">
                                        {!! Form::label('biography', 'biography') !!}
                                        {!! Form::text('biography', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('biography', 'biography') !!}
                                        {!! Form::textarea('biography', null, ['class' => 'form-control']) !!}
                                    </div>



                                    <div class="form-group">
                                        {!! Form::label('image', 'image') !!}
                                        {!! Form::file('image', null, ['class' => 'form-control']) !!}
                                    </div>

                                    {{--<div class="form-group">--}}
                                        {{--{!! Form::label('bank_credentials', 'bank credentials') !!}--}}
                                        {{--{!! Form::text('bank_credentials', null, ['class' => 'form-control']) !!}--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group">--}}
                                        {{--{!! Form::label('bank_number', 'bank number') !!}--}}
                                        {{--{!! Form::text('bank_number', null, ['class' => 'form-control']) !!}--}}
                                    {{--</div>--}}

                                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

                                    <a href="{{ URL::route('home_page') }}" class="btn btn-default">terug</a>

                                {!! Form::close() !!}
                            @endif

                        @else
                            your account already have author privileges
                        @endif
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