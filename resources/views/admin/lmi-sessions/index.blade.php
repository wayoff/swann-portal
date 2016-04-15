@extends('admin.layouts.content')

@section('Page__Description')
    LMI Sessions
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-table"></i>  <a href="/admin/lmi-sessions">LMI Sessions</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.lmi-sessions.create') }}" class="btn btn-primary"> Create New LMI Sessions</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Active</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if(!$lmiSessions->isEmpty())
                    @foreach($lmiSessions as $lmiSession)
                    <tr>
                        <td>{{ string_pad($lmiSession->id) }}</td>
                        <td>{{ $lmiSession->name }}</td>
                        <td>{{ $lmiSession->user_id ? $lmiSession->user->name : 'none'}}</td>
                        <td>
                            <form action="{{ route('admin.lmi-sessions.destroy', $lmiSession->id) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.lmi-sessions.edit', $lmiSession->id) }}" class="btn btn-info btn-xs"> Edit</a>
                                <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="10">No Data was Found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@stop