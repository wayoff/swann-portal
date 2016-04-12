@extends('admin.layouts.content')

@section('Page__Description')
    Procedures / Steps
@stop


@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.procedures.index') }}"> Procedures </a>
        </li>
        <li>
            <a href="{{ route('admin.procedures.{id}.steps.index', [$procedure->id]) }}">Steps</a>
        </li>
        <li class="active">
            <a href="#">Edit Step</a>
        </li>
    </ol>
@stop

@section('Content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Step</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.procedures.{id}.steps.update', [$procedure->id, $step->id]) }}">
                    {!! csrf_field() !!}
                    {!! method_field('PUT') !!}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Title</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title" value="{{ $step->title }}">

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
                            <textarea name="content" id="" cols="30" rows="10" class="form-control">{{ $step->content }}</textarea>

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


                    @if($step->photo_id)
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Image</label>

                            <div class="col-md-6">
                                <img src="{{ $step->photo->getImage() }}" style="width: 100%" alt="">
                            </div>
                        </div>
                    @endif


                    <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Document</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="document" >

                            @if ($errors->has('document'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('document') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    @if($step->document_id)
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Document</label>

                            <div class="col-md-6">
                                <a href="{{ $step->document->getDocument() }}" class="btn btn-default" target="_blank"> {{ $step->document->name . '.' . $step->document->extension }}</a>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-table"></i> Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop