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

                        <div class="form-group">
                            <label>name</label>
                            {{$video->name}}
                        </div>

                        <div class="form-group">
                            <label>category</label>
                            {{$video->category->name}}
                        </div>

                        <div class="form-group">
                            <label>thumbnail</label>
                            <img src="/public/video/thumbnail/{{$video->thumbnail}}">
                        </div>

                        <div class="form-group">
                            <label>video_key</label>
                            {{$video->video_key}}
                        </div>

                        <div class="form-group">
                            <label>beschrijving</label>
                            {{$video->beschrijving}}
                        </div>

                        <div class="form-group">
                            <label>author</label>
                            {{$video->autho}}
                        </div>

                        <div class="form-group">
                            <label>prijs</label>
                            {{$video->prijs}}
                        </div>

                        <div class="form-group">
                            <label>level</label>
                            {{$video->level}}
                        </div>

                        <div class="form-group">
                            <label>status</label>
                            {{$video->status}}
                        </div>

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