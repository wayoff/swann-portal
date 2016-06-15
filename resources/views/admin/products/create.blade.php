@extends('admin.layouts.content')

@section('Page__Description')
    Products
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-file"></i>  <a href="{{ route('admin.products.index') }}">Products</a>
        </li>
        <li class="active">
            <a href="#">Add product</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Register Product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Name</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required minlength="3" maxlength="250">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('model_no') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Model No</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="model_no" value="{{ old('model_no') }}" required minlength="3" maxlength="250">

                                @if ($errors->has('model_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('model_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Category</label>

                            <div class="col-md-8">
                                <select name="categories[]" id="" multiple class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('categories') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Description</label>

                            <div class="col-md-8">
                                <textarea name="description" id="target_tinymce" class="form-control" >{{ old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Image</label>

                        <div class="col-md-8">
                            <input type="file" class="form-control" name="image" >

                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
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

                    <div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">is Featured Product</label>

                        <div class="col-md-8">
                            <select name="featured" id="" class="form-control">
                                <option value="0"> No </option>
                                <option value="1"> Yes </option>
                            </select>

                            @if ($errors->has('featured'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('featured') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-table"></i> Register Product
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop