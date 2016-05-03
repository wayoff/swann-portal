@extends('admin.layouts.content')

@section('Page__Description')
    Supervisor Password
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="/admin">Dashboard</a>
        </li>
        <li>
            <a href="#"> Supervisor Password </a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-hover">
            <tr>
                <td> Password</td>
                @if(!empty($password))
                    <td>
                        {{ $password->password }}
                    </td>
                    <td>
                        <a href="{{route('admin.supervisor-passwords.edit', $password->id)}}" class="btn btn-info">
                            Edit
                        </a>
                    </td>
                @else
                    <td>
                        No Password Yet
                    </td>
                    <td>
                        <a href="{{route('admin.supervisor-passwords.create')}}" class="btn btn-primary">
                            Create
                        </a>
                    </td>
                @endif
            </tr>
        </table>
    </div>
@stop