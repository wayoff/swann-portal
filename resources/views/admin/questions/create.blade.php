@extends('admin.layouts.content')

@section('Page__Description')
    Products / Questions
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-book"></i>  <a href="{{ route('admin.questions.index') }}">Questions</a>
        </li>
        <li class="active">
            <a href="#"> Create Question</a>
        </li>
    </ol>
@stop

@section('Content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Register Question</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.questions.store') }}">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Title</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">

                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Answer</label>

                        <div class="col-md-8">
                            <textarea name="answer" class="form-control" id="target_tinymce">{{ old('answer') }}</textarea>

                            @if ($errors->has('answer'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('answer') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">is Featured ? </label>

                        <div class="col-md-8">
                            <select name="featured" id="" class="form-control">
                                <option value="1"> Yes </option>
                                <option value="0"> No </option>
                            </select>

                            @if ($errors->has('featured'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('featured') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Document</label>

                        <div class="col-md-8">
                            <input type="file" class="form-control" name="document" >

                            @if ($errors->has('document'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('document') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
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