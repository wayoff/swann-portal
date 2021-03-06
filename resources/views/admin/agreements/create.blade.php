@extends('admin.layouts.content')

@section('Page__Description')
    Operations Policies and Procedures
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-file"></i>  <a href="#">Operations Policies and Procedures</a>
        </li>
        <li class="active">
            <a href="#">Add Operations Policies and Procedures</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Register Operations Policies and Procedures</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.agreements.store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required minlength="3" maxlength="60">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Content</label>

                            <div class="col-md-6">
                                <textarea name="content" id="" cols="30" rows="10" class="form-control"  >{{ old('content') }}</textarea>

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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