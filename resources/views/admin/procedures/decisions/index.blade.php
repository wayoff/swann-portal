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
            <div class="tree">
                @include('admin.procedures.decisions._list', ['decision', $decision])
            </div>
        @endif
    </div>
@stop

@section('footer')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('.btn-submit').on('click', function() {
                if (confirm('Are you sure to delete data?')) {
                    $(this).closest('form').submit();
                }
            });

            $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
            $('.tree li.parent_li > span').on('click', function (e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(":visible")) {
                    children.hide('fast');
                    $(this).attr('title', 'Expand this branch').find(' > i').addClass('glyphicon-plus-sign').removeClass('glyphicon-minus-sign');
                } else {
                    children.show('fast');
                    $(this).attr('title', 'Collapse this branch').find(' > i').addClass('glyphicon-minus-sign').removeClass('glyphicon-plus-sign');
                }
                e.stopPropagation();
            });
        });
    </script>
@stop
