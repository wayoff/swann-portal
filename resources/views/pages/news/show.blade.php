@extends('layouts.descriptive-content')

@section('Page__Title', $news->title)

@section('Page__Description')
    <i>{{ $news->when() }}</i> 
@stop

@section('Page__BreadCrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('home') }}">Home</a>
        </li>
        <li>
            <a href="{{ url('news') }}">News & Updates</a>
        </li>
        <li class="active"> {{ $news->title }} </li>
    </ol>
@stop

@section('content')
    <style>
        .disable-hover-effect:hover {
            text-decoration:none !important;
        }
    </style>
    <div class="News__Show--Content">
        <p class="News__Show--Content-Paragraph">
            <a href="{{ $news->photo_id 
                            ? $news->photo->getImage() 
                            : '#' }}"
                class="disable-hover-effect image-link">
                <img src="{{ $news->photo_id 
                                ? $news->photo->getImage() 
                                : config('swannportal.path.default-img') }}"
                     class="News__Show--image">
            </a>
            {{ $news->content }}
        </p>
        
        @if($news->document_id)
            <a  class="btn btn-default btn-lg"
                target="_blank" 
                href="{{$news->document->getDocument()}}">
                View / Download Document
            </a>
        @endif
        <div class="clearfix"></div>

        @if($news->video_id)
            @if($news->video->converted)
                <div class="col-md-10 col-md-offset-1 News__Show--Video-Container">
                <h5>{{ $news->video->title }}</h5>
                    <div class="embed-responsive embed-responsive-16by9">
                        <video class="embed-responsive-item Video__Iframe" controls
                            poster="/img/swann-logo.png"
                        >
                          <source src="{{ $news->video->getMP4() }}" type="video/mp4">
                          <source src="{{ $news->video->getOGG() }}" type="video/ogg">
                          Your browser does not support HTML5 video.
                        </video>
                    </div>
                    <div class="text-center">
                        <i>{{ $news->video->description }}</i>
                    </div>
                </div>
            @endif
        @endif
    </div>
@stop