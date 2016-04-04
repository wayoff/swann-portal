@extends('layouts.descriptive-content')

@section('Page__Title', $news->title)

@section('Page__Description')
    <i>{{ $news->when() }}</i> Published
@stop

@section('content')
    <div class="News__Show--Content">
        <p>
            <img src="{{ $news->photo_id ? $news->photo->getImage() : config('swannportal.path.default-img') }}" class="News__Show--image">
            {{ $news->content }}
        </p>

        <div class="clearfix"></div>

        @if($news->video_id)
            @if($news->video->converted)
                <div class="col-md-12 News__Show--Video-Container">
                <h5>{{ $news->video->title }}</h5>
                    <div class="embed-responsive embed-responsive-16by9 News__Show--Video">
                        <video controls>
                          <source src="{{ $news->video->getOGG() }}" type="video/ogg">
                          <source src="{{ $news->video->getMP4() }}" type="video/mp4">
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