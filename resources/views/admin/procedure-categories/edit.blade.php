@extends('admin.layouts.content')

@section('Page__Description')
    Trouble Shooting Categories
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-table"></i>  <a href="/admin/categories">Trouble Shooting Categories</a>
        </li>
        <li class="active">
            <a href="#"> Update Trouble Shooting Category: {{ $procedureCategory->name }}</a>
        </li>
    </ol>
@stop

@section('Content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Update Trouble Shooting Category</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.procedure-categories.update', $procedureCategory->id) }}">
                    {!! csrf_field() !!}
                    {!! method_field('put') !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ $procedureCategory->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Parent</label>

                        <div class="col-md-6">
                            <select name="parent_id" class="form-control">
                                <option value=""> -- None -- </option>
                                @foreach($parents as $parent)
                                    <option value="{{$parent->id}}"
                                            {{$procedureCategory->parent_id === $parent->id ? 'selected' : ''}}
                                    >
                                        {{$parent->name}}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('parent_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('parent_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Order</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="order" value="{{$procedureCategory->order}}">
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