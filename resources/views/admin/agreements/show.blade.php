@extends('admin.layouts.content')

@section('Page__Description')
    Operations Policies and Procedures
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-file"></i>  <a href="/admin/agreements">Operations Policies and Procedures</a>
        </li>
        <li class="active">
            <a href="#">
                {{$agreement->title}}
            </a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">User's Agreed on Term's and Policies: {{$agreement->title}}</h3>
                </div>
                <div class="panel-body">
                    @if($agreement->users->isEmpty())
                        <div class="alert alert-info">
                            No User has agreed yet;
                        </div>
                    @else
                        <ul>
                            @foreach($agreement->users as $user)
                            <li> {{$user->name}} </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop