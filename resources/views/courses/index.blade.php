@extends('layouts.app')

@section('title')
    allo
@endsection

@section('description')

@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Author profile panel</div>

                    <div class="panel-body">

                        @include('errors.message')

                        <div class="col-lg-12">
                            <div class="col-lg-3">

                                <ul class="nav of nav-stacked">
                                    <h3>Categories</h3>
                                    @foreach($category->parent->children as $cate)
                                        {{--@if()--}}
                                        <li> <a href="{{ URL::route('video_categories_sub',str_replace(' ','-', $cate->name))}}">{{$cate->name}}</a></li>
                                    @endforeach
                                </ul>

                                <h3>menu</h3>
                                <ul class="nav of nav-stacked">
                                    <form action="{{URL::current()}}">

                                        <ul class="nav of nav-stacked">
                                            <h4>Author</h4>
                                            <?php $auth = \Input::has('author') ? \Input::get('author'): [] ?>
                                            @foreach($authors->author->get() as $author)
                                                <input type="radio" name="author[]" value="{{$author->user->name}}" {{in_array($author->user->name, $auth ) ? 'checked' :'' }}>
                                                {{$author->user->name}}
                                                <br>
                                            @endforeach
                                        </ul>

                                        <h4>Price</h4>
                                        <div class="form-control">
                                            <input id="ex2" type="text" class="span2" name="price" value="" data-slider-min="{{\App\Video::min('prijs')}}" data-slider-max="{{\App\Video::max('prijs', 'desc')}}" data-slider-step="5" data-slider-value="[{{ \Input::get('price') == null ? $videos->min('prijs').','.$videos->max('prijs') : \Input::get('price')}}]"/>

                                        </div>
                                        <br>
                                        <b>{{\App\Video::min('prijs')}}</b>
                                        <b class="pull-right">{{\App\Video::max('prijs')}}</b>
                                        <br>
                                        {{--min: <input type="text" name="min_price" value="">--}}
                                        {{--<br>--}}
                                        {{--max: <input type="text" name="max_price" value="{{\Input::get('max_price')}}">--}}
                                        <h4>Level</h4>
                                        <?php $level = \Input::has('level') ? \Input::get('level'): [] ?>
                                        <input type="checkbox" name="level[]" value="beginner" {{in_array('beginner', $level ) ? 'checked' :'' }}>
                                        beginner <br>
                                        <input type="checkbox" name="level[]" value="intermediate" {{in_array('intermediate', $level ) ? 'checked' :'' }}>
                                        intermediate <br>
                                        <input type="checkbox" name="level[]" value="advanced" {{in_array('advanced', $level ) ? 'checked' :'' }}>
                                        advanced  <br>
                                        <input type="checkbox" name="level[]" value="expert" {{in_array('expert', $level ) ? 'checked' :'' }}>
                                        expert <br>
                                        <br>

                                        <button class="pull-right">Search</button>

                                    </form>
                                </ul>

                            </div>
                            <div class="col-lg-9">

                                <h1>{{$category->parent->name}} > {{$category->name}} </h1>
                                <hr>
                                @if($videos->count() == 0)
                                    <b>Sorry No Records Found..</b>
                                @else
                                    There Are {{count($videos)}} Record Found..
                                @endif
                                <br>
                                <br>
                                @foreach($videos as $video)
                                    <div class="col-lg-12" style="margin-bottom: 20px;">
                                        <div class="col-lg-5">
                                            <div class="video-wrapper">
                                                <div class="video-main">
                                                    @if($video->thumbnails)
                                                        <img width="100%" height="100%" src="{{'/videos/thumbnail/'.$video->thumbnails}}" rel="" >
                                                    @else
                                                        <img width="100%" height="100%" src="/images/video-icon-thumbnail.png" rel="" >
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <head>{{str_limit($video->name, 30)}}</head><br>
                                            <p><small>{{str_limit($video->beschrijving, 100)}}</small></p>
                                            <label>price: </label><span>{{$video->prijs}}</span>
                                            <label>level: </label><span>{{$video->level}}</span>
                                            <label>author: </label><span> <a href="{{ URL::route('author_show', $video->author->user->name) }}"> {{$video->author->user->name}}</a></span>
                                            <a href="{{ URL::route('video_show', $video->video_key) }}" class="btn btn-primary pull-right">Show</a>
                                        </div>
                                    </div>
                                    <hr style=" width:100%; border-top: 1px solid #ddd !important;">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.1.3/bootstrap-slider.js"></script>
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
        // With JQuery
        $("#ex2").slider({
            tooltip: 'always'

        });

        // Without JQuery
        var slider = new Slider('#ex2', {
            tooltip: 'always'
        });


    </script>


@endsection