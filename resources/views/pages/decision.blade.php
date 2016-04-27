@extends('layouts.descriptive-content')

@section('Page__Title', 'Decision Tree')

@section('header')
    <style>
    .Box {
        padding: 10px;
        margin: 3px 0;
    }
    </style>
@stop

@section('content')
<div class="row">
    <div class="col-md-offset-1 col-md-10 text-center">
        
        @if($decision->parent_id)
            <a href="/decision/{{$procedure->id}}?branch={{$decision->parent_id}}#Main__Content" class="btn btn-circle btn-default btn-lg">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a>
        @endif

        <h3>{{$decision->title}}</h3>
        
        @if($decision->children->isEmpty())
            <div class="alert Box">
                <h3> You've reached the end.. </h3>
            </div>
        @else
            @foreach($decision->children as $child)
                <div class="col-md-6 Box">
                    <a href="/decision/{{$procedure->id}}?branch={{$child->id}}#Main__Content" class="btn btn-lg btn-default btn-block">
                        {{$child->label}}
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>
@stop