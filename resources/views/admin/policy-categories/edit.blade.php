@extends('admin.layouts.content')

@section('Page__Description')
    Policy Categories
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-table"></i>  <a href="/admin/policy-categories">Policy Categories</a>
        </li>
        <li class="active">
            <a href="#"> Update Policy Category: {{ $policyCategory->name }}</a>
        </li>
    </ol>
@stop

@section('Content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Update Policy Category</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.policy-categories.update', $policyCategory->id) }}">
                    {!! csrf_field() !!}
                    {!! method_field('put') !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ $policyCategory->name }}">

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
                            <input type="number" class="form-control" required name="order" value="{{$policyCategory->order}}">

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
                                Update
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@stop