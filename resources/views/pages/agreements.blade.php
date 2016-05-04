@extends('layouts.descriptive-content')

@section('Page__Title', 'Operations Policies and Procedures')

@section('content')
<div class="row">
    <div class="col-md-offset-1 col-md-10 text-center">
        @if($agreements->isEmpty())
            <div class="alert alert-info">
                No Agreement found
            </div>
        @else
            @foreach($agreements as $agreement)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{config('swannportal.path.document-icon')}}" alt="Image">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$agreement->title}}</h4>
                        <p>{{str_limit($agreement->content, 30)}}</p>
                    </div>
                </div>
            @endforeach
        @endif

        <div class="text-center">
            {{$agreements->render()}}
        </div>
    </div>
</div>
@stop