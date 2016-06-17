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


                        <div class="col-lg-12">
                            <div class="col-lg-3">

                                <h3>menu</h3>
                                <ul class="nav of nav-stacked">
                                    <h4>Author</h4>
                                    @foreach($authors as $author)
                                        <li>- {{$author->name}}</li>
                                    @endforeach
                                </ul>

                            </div>
                            <div class="col-lg-9">
                                <h1>{{$category->name}}</h1>
                                @foreach($category->video as $video)
                                    <div class="col-lg-12" style="margin-bottom: 20px; border: 1px solid">
                                        <div class="col-lg-3" style="border: 1px solid; height: 150px;">
                                            <span>img</span>
                                            {{$video->thumbnails}}
                                        </div>
                                        <div class="col-lg-9">
                                            <head>{{$video->name}}</head>
                                            <label>description</label>
                                            <p>{{$video->beschrijving}}</p>
                                            <label>price: </label><span>{{$video->prijs}}</span>
                                            <label>level: </label><span>{{$video->level}}</span>
                                            <label>author: </label><span> <a href="{{ URL::route('author_show', $video->author->user->name) }}"> {{$video->author->user->name}}</a></span>
                                            <a href="{{ URL::route('video_show', $video->video_key) }}" class="btn btn-primary pull-right">Show</a>
                                        </div>
                                    </div>
                                    <hr>

                                    @foreach($video->author as $author)
                                        {{--{{dd($author)}}--}}
                                    @endforeach
                                @endforeach
                            </div>
                        </div>




                        {{--@foreach($category->video as $video)--}}
                            {{--<p style="color: #2b38cd">{{$video->category_id}}</p><br>--}}
                            {{--@foreach($video->author as $author)--}}
                                {{--{{($author->biography)}}--}}
                            {{--@endforeach--}}

                            {{--@foreach($video->author as $author)--}}
                                {{--{{(var_dump($author))}}--}}
                            {{--@endforeach--}}
                        {{--@endforeach--}}
                        {{--@foreach($videos->video as $video)--}}


                            {{--{{dd($video->author)}}--}}

                            {{--@foreach($video->author as $author)--}}
                                {{--{{($video->author->count())}}--}}
                                {{--{{$author->biography}}--}}
                            {{--@endforeach--}}
                            {{--@foreach($video->video as $vid)--}}
                                {{--{{$vid->name}}--}}
                            {{--@endforeach--}}
                        {{--@endforeach--}}

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