@extends('admin.layouts.content')

@section('Page__Description')
    Users
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-users"></i>  <a href="/admin/users">Users</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary"> Create New User</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Username</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ string_pad($user->id) }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>

                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="form-inline" role="form">
                            {!! csrf_field() !!}
                            {!! method_field('delete') !!}
                        
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info btn-xs"> Edit</a>
                            <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {{$users->render()}}
        </div>
    </div>
@stop