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

                        @include('errors.message')

                        {!! Form::model(array('route' => 'credits_store')) !!}
                        {!! method_field('patch') !!}
                            <div class="form-group">
                                {!! Form::label('order', 'credits') !!}
                                <br>
                                {!! Form::radio('order', '442-244-55') !!}  <label>100 credits for € 10.- </label> <br>
                                {!! Form::radio('order', '442-244-56') !!}  <label>200 credits for € 20.- </label> <br>
                                {!! Form::radio('order', '442-244-57') !!}  <label>500 credits for € 50.- </label> <br>
                                {!! Form::radio('order', '442-244-58') !!}  <label>750 credits for € 75.- </label> <br>
                                {!! Form::radio('order', '442-244-59') !!}  <label>1000 credits for € 100.- </label> <br>
                            </div>

                            {!! Form::submit('buy credits', ['class' => 'btn btn-primary']) !!}

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