@extends('layouts.app')

@section('title')
    allo
@endsection

@section('description')
    Here is you description. You can else echo content and use your foreach in here.
@stop

@section('content')

    <style>
        .circle {
            background: red;
            border-radius: 200px;
            color: white;
            height: 150px;
            font-weight: bold;
            width: 150px;
            display: table;
            margin: 20px auto;
        }
        .circle p {
            vertical-align: middle;
            display: table-cell;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">sign up for are partner programm</div>

                    <div class="panel-body">

                        @include('errors.message')

                        <div class="row">
                            <div class="col-lg-2 pull-left">
                                <img class="img-responsive img-circle" src="/author/{{$author->author->image}}">
                            </div>
                            <div class="col-lg-6 pull-left">
                                <label>Author:</label> {{$author->name}}
                                <h4 id="glyphicons-glyphs">Biography:</h4>
                                <p>{{$author->author->biography}}</p>
                                <span>videos delen op facebook, twitter en google+ dit maakt de vindbaarheid beter</span>
                            </div>
                            <div class="col-lg-4 pull-right">
                                <div class="circle">
                                    <p class="text-center">Rating <br><span class="">5,5</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <h3>list of videos</h3>
                                @foreach($videos as $video)
                                    <a href="{{URL::route('video_show', $video->video_key)}}">{{$video->name}}</a>
                                    <br>
                                @endforeach
                            </div>
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