@extends('admin.layouts.content')

@section('Page__Description')
    Screenshot Categories
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-table"></i>  <a href="/admin/screenshot-categories">Screenshot Categories</a>
        </li>
        <li class="active">
            <a href="#"> Update Category</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Category</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.screenshot-categories.update', $category->id) }}">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Order</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="order" value="{{ $category->order }}">

                                @if ($errors->has('order'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('order') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-table"></i> Update
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop