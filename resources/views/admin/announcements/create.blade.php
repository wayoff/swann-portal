@extends('admin.layouts.content')

@section('Page__Description')
    News
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-file"></i>  <a href="/admin/dashboard">Dashboard</a>
        </li>
        <li>
            <i class="fa fa-exclamation-circle"></i>  <a href="{{route('admin.announcements.index')}}">Announcements</a>
        </li>
        <li class="active">
            <a href="#">Add Announcement</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Register Announcements</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.announcements.store') }}">
                        {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Content</label>

                                <div class="col-md-6">
                                    <textarea name="content" id="" cols="30" rows="10" class="form-control" required minlength="3" >{{ old('content') }}</textarea>

                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">End Date</label>

                                <div class="col-md-6">
                                    <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">

                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('end_date') }}</strong>
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