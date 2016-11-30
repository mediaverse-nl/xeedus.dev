@extends('layouts.app')

@section('title')

@endsection

@section('content')

    <div class="container">
        <div class="row">

            @include('layouts.menus.__author')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Author panel</div>

                    <div class="panel-body">

                        @include('errors.message')

                        {!! Form::open( array('route' => 'author_video_store', 'class' => '', 'method' => 'post', 'files'=> true )) !!}

                        {{--@include('errors.message')--}}

                        <div class="modal " id="progressDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Please wait while we update your topic. You will be redirected automatically!</p>

                                        <div class="progress progress-striped active">
                                            <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    <span class="sr-only">/span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div class="col-lg-12">

                            <fieldset>

                                <!-- category id -->
                                <div class="form-group">
                                    {!! Form::label('cate_id', 'category') !!}
                                    {!! Form::select('category_id', \App\Category::where('cate_id', '!=', 0)->groupBy('name')->pluck('name', 'id'), null, ['class' => 'form-control'] ) !!}
                                </div>

                                <!-- name -->
                                <div class="form-group">
                                    {!! Form::label('name', 'name') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>

                                <!-- prijs -->
                                <div class="form-group">
                                    {!! Form::label('prijs', 'prijs') !!}
                                    {!! Form::number('prijs', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>

                                <!-- prijs -->
                                <div class="form-group">
                                    {!! Form::label('level', 'level') !!}<br>

                                    {{--{!! Form::radio('level', 1) !!}--}}

                                    {!! Form::radio('level', 'beginner') !!}
                                    {!! Form::label('level', 'beginner') !!}
                                    {!! Form::radio('level', 'intermediate') !!}
                                    {!! Form::label('level', 'intermediate') !!}
                                    {!! Form::radio('level', 'advanced') !!}
                                    {!! Form::label('level', 'advanced') !!}
                                    {!! Form::radio('level', 'expert') !!}
                                    {!! Form::label('level', 'expert') !!}
                                </div>

                                <!-- beschrijving -->
                                <div class="form-group">
                                    {!! Form::label('beschrijving', 'beschrijving') !!}
                                    {!! Form::textarea('beschrijving', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>

                                <!-- status -->
                                <div class="form-group">
                                    {!! Form::label('status', 'status') !!}<br>
                                    {{--{!! Form::select('status', \App\Video::lists('status', 'status'), null, ['class' => 'form-control'] ) !!}--}}

                                    {!! Form::radio('status', 'public') !!}
                                    {!! Form::label('status', 'public') !!}
                                    {!! Form::radio('status', 'private') !!}
                                    {!! Form::label('status', 'private') !!}
                                </div>

                                <!-- thumbnails -->
                                <div class="form-group">
                                    {!! Form::label('thumbnails', 'thumbnails') !!}
                                    {!! Form::file('thumbnails') !!}
                                </div>

                                <!-- thumbnails -->
                                <div class="form-group">
                                    {!! Form::label('video', 'video') !!}
                                    {!! Form::file('video') !!}
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary aaa pull-right'] ) !!}
                                </div>

                            </fieldset>

                        </div>

                        {!! Form::close()  !!}



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
<script>
    function OnProgress(event, position, total, percentComplete){
        //Progress bar
        console.log(total);
        $('#pb').width(percentComplete + '%') //update progressbar percent complete
        $('#pt').html(percentComplete + '%'); //update status text
    }
</script>
@endsection