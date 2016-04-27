@extends('admin.layouts.content')

@section('Page__Description')
    Dashboard
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
        </li>
        <li>
            <a href="#">Procedure : {{$procedure->name}}</a>
        </li>
        <li>
            <a href="{{route('admin.procedures.{id}.decisions.index', $procedure->id)}}"> Decision Tree </a>
        </li>
        <li class="active">
            <a href="#"> Add </a>
        </li>
    </ol>
@stop

@section('Content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Register Branch</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.procedures.{id}.decisions.store', $procedure->id) }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="parent" value="{{$parent->id}}">

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Title</label>

                        <div class="col-md-6">
                            <textarea name="title" class="form-control">{{ old('title') }}</textarea>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Label</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="label" value="{{ old('label') }}">

                            @if ($errors->has('label'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('label') }}</strong>
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