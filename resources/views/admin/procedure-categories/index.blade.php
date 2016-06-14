@extends('admin.layouts.content')

@section('Page__Description')
    Trouble Shooting Categories
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-table"></i>  <a href="/admin/procedure-categories">Trouble Shooting Categories</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        @foreach($procedureCategories as $procedureCategory)
            <div class="tree">
                @include('admin.procedures-categories._list', ['procedureCategory', $procedureCategory])
            </div>
        @endforeach
    </div>
@stop