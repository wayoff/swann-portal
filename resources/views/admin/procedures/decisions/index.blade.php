@extends('admin.layouts.content')

@section('Page__Description')
    Trouble Shooting / Decision Tree
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
        </li>
        <li>
            <a href="#">Procedure : {{$procedure->name}}</a>
        </li>
        <li class="active">
            <a href="#"> Decision Tree </a>
        </li>
    </ol>
@stop

@section('header')
    <meta id="procedure_id" data-content="{{$procedure->id}}">
@stop

@section('Content')
    <div class="col-md-12">
        @if(empty($decision))
            <div class="alert alert-success">
                No Decision Tree yet, start by clicking
                <a href="{{ route('admin.procedures.{id}.decisions.start', $procedure->id) }}">
                    Here
                </a>
            </div>
        @else
            @include('admin.procedures.decisions._list', ['decision', $decision])
        @endif
    </div>
@stop