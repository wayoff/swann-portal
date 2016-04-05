@extends('admin.layouts.content')

@section('Page__Description')
    Dashboard
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-file"></i>  <a href="#">News</a>
        </li>
        <li class="active">
            <a href="#">Edit News</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update News</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.news.update', $news->id) }}">
                        {!! csrf_field() !!}
                        {!! method_field('put') !!}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ $news->title }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Content</label>

                            <div class="col-md-6">
                                <textarea name="content" id="" cols="30" rows="10" class="form-control">{{ $news->content }}</textarea>

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Image</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="image" >

                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Current Image</label>

                        <div class="col-md-6">
                            <img src="{{ $news->photo->getImage() }}" style="width: 100%" alt="">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Video</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="video" >

                            @if ($errors->has('video'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('video') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Current Video</label>

                        <div class="col-md-6">
                            <div align="center">
                                <video style="width: 100%;" controls>
                                  <source src="{{ $news->video->getOGG() }}" type="video/ogg">
                                  <source src="{{ $news->video->getMP4() }}" type="video/mp4">
                                  Your browser does not support HTML5 video.
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('video_title') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Video Title</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="video_title" value="{{ $news->video->title }}">

                            @if ($errors->has('video_title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('video_title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('video_description') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Video Description</label>

                        <div class="col-md-6">
                            <textarea name="video_description" id="" cols="30" rows="10" class="form-control">{{ $news->video->description }}</textarea>

                            @if ($errors->has('video_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('video_description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-table"></i> Register
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop