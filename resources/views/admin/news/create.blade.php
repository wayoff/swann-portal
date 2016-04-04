@extends('admin.layouts.content')

@section('Page__Description')
    News
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-file"></i>  <a href="#">News</a>
        </li>
        <li class="active">
            <a href="#">Add news</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register News</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.news.store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">

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
                                <textarea name="content" id="" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>

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

                    <div class="form-group{{ $errors->has('video_title') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Video Title</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="video_title" value="{{ old('video_title') }}">

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
                            <textarea name="video_description" id="" cols="30" rows="10" class="form-control">{{ old('video_description') }}</textarea>

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