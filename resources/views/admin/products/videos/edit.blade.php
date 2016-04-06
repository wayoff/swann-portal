@extends('admin.layouts.content')

@section('Page__Description')
    Products / Videos
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-book"></i>  <a href="{{ route('admin.products.index') }}">Products</a>
        </li>

        <li>
            <a href="#">{{ $product->name }}</a>
        </li>

        <li>
            <a href="{{ route('admin.products.{id}.videos.index', $product->id) }}"> Videos </a>
        </li>
        <li class="active">
            <a href="#"> Edit Video</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Video</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.{id}.videos.update', [$product->id, $video->id]) }}">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}

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
                                  <source src="{{ $video->getOGG() }}" type="video/ogg">
                                  <source src="{{ $video->getMP4() }}" type="video/mp4">
                                  Your browser does not support HTML5 video.
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('video_title') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Video Title</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="video_title" value="{{ $video->title }}">

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
                            <textarea name="video_description" id="" cols="30" rows="10" class="form-control">{{ $video->description }}</textarea>

                            @if ($errors->has('video_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('video_description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('video_featured') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">is Featured Video</label>

                        <div class="col-md-6">
                            <select name="video_featured" id="" class="form-control">
                                <option value="0"> No </option>
                                <option value="1" {{ $video->featured ? 'selected' : '' }}> Yes </option>
                            </select>

                            @if ($errors->has('video_featured'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('video_featured') }}</strong>
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