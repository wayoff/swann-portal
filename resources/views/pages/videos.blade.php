@extends('layouts.descriptive-content')

@section('Page__Title', 'Featured Videos')

@section('Page__BreadCrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('home') }}">Home</a>
        </li>
        <li class="active">
            <a href="{{ url('videos') }}"> Videos </a>
        </li>
    </ol>
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        @if($videos->isEmpty())
            <div class="alert alert-info">
                No Featured Video yet
            </div>
        @else
            @foreach($videos as $video)
                <div class="col-md-4 Video">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video class="embed-responsive-item Video__Iframe" controls>
                          <source src="{{ $video->getOGG() }}" type="video/ogg">
                          <source src="{{ $video->getMP4() }}" type="video/mp4">
                          Your browser does not support HTML5 video.
                        </video>
                    </div>
                    <hr />
                    <h4 class="Video__Title">{{ $video->title }}</h4>
                    <p class="Video__Description">
                        {{ $video->description }}
                    </p>
                </div>
            @endforeach
        @endif
    </div>
</div>
@stop