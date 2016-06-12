@extends('layouts.app')

@section('title')
    allo
@endsection

@section('description')
    Here is you description. You can else echo content and use your foreach in here.
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">sign up for are partner programm</div>

                    <div class="panel-body">

                        @include('layouts.menus.author_menu')

                        @include('errors.message')

                        {!! Form::open(array('route' => array('author_video_store'), 'files' => true )) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('beschrijving', 'beschrijving') !!}
                            {!! Form::textarea('beschrijving', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('category_id', 'category') !!}
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <optgroup label="{{$category->name}}">
                                    @foreach($category->children as $child)
                                            <option value="{{$child->cate_id}}">{{$child->name}}</option>
                                    @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('prijs', 'prijs') !!}
                            {!! Form::text('prijs', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'status') !!}
                            {!! Form::text('status', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('level', 'level') !!}
                            {!! Form::text('level', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('thumbnail', 'thumbnail') !!}
                            {!! Form::file('thumbnail', null) !!}
                        </div>

                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

                        <a href="{{ URL::route('home_page') }}" class="btn btn-default">terug</a>

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