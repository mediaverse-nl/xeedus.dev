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
                                    <label>author: </label><span>{{$video->author->user->name}}</span>
                                    {{--<a href="{{ URL::route('video_show', $video->video_key) }}" class="btn btn-primary pull-right">Show</a>--}}
                                    @if($status)
                                        show video
                                    @else
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Modal Header</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <br>
                                                        <label>name</label>{{$video->name}}<br>
                                                        <label>prijs</label>{{$video->prijs}}<br>
                                                        <label>level</label>{{$video->level}}<br>
                                                        <label>author</label>{{$video->author->user->name}}<br>
                                                        <label>categorie</label>{{$video->category->name}}<br>

                                                       video ke {{$video->video_key}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        {!! Form::open(array('route' => array('order_store', $video->video_key) )) !!}
                                                            {{ Form::hidden('video_key', $video->video_key) }}
                                                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">buy video</button>

                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <h3>Author video list</h3>
                            @foreach($list as $item)
                                <a href="{{URL::route('video_show', $item->video_key)}}">{{$item->name}}</a>
                                <br>
                            @endforeach
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