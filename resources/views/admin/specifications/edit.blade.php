@extends('admin.layouts.content')

@section('Page__Description')
    Specifications
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-table"></i>  <a href="/admin/specifications">Specifications</a>
        </li>
        <li class="active">
            <a href="#"> Update Specifications</a>
        </li>
    </ol>
@stop

@section('Content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Update Specifications</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"  action="{{ route('admin.specifications.update', $specification->id) }}">
                    {!! csrf_field() !!}
                    {!! method_field('PUT') !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ $specification->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Category</label>

                        <div class="col-md-6">
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$specification->category_id === $category->id ? 'selected' : ''}}>
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