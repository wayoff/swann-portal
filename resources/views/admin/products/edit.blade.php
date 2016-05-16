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
            <a href="#">Edit product</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.update', $product->id) }}">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}" required minlength="3" maxlength="250">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('model_no') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Model No</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="model_no" value="{{ $product->model_no }}" required minlength="3" maxlength="250">

                                @if ($errors->has('model_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('model_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Category</label>
                            <div class="col-md-6">
                                <select name="categories[]" id="" multiple class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->hasCategory($category->id) ? 'selected' : ''}}>
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
                            <label class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea name="description" id="" cols="30" rows="10" class="form-control" required>{{ $product->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
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

                    @if($product->photo_id)
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Image</label>

                            <div class="col-md-6">
                                <img src="{{ $product->photo->getImage() }}" style="width: 100%" alt="">
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

                    @if($product->document_id)
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Document</label>

                            <div class="col-md-6">
                                <a href="{{ $product->document->getDocument() }}" class="btn btn-default" target="_blank"> View </a>
                                <hr />
                                <a href="/admin/products/{{$product->id}}/remove-document" class="btn btn-warning"> Remove Product </a>
                            </div>
                        </div>

                    @endif

                    <div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">is Featured Product</label>

                        <div class="col-md-6">
                            <select name="featured" id="" class="form-control" required>
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
                            <div class="col-md-6 col-md-offset-4">
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