@extends('admin.layouts.content')

@section('Page__Description')
    LMI Sessions
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-edit"></i>  <a href="/admin/lmi-sessions">LMI Sessions</a>
        </li>
        <li class="active">
            <a href="#"> Edit LMI Sessions</a>
        </li>
    </ol>
@stop

@section('Content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.lmi-sessions.update', $lmiSession->id) }}">
                    {!! csrf_field() !!}
                    {!! method_field('PUT') !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ $lmiSession->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-edit"></i> Register
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@stop