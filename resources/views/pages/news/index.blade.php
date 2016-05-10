@extends('layouts.descriptive-content')

@section('Page__Title', 'News & Updates')

@section('content')
    <div class="row">
        @if($news->isEmpty())
            <div class="alert alert-info">
                No News yet
            </div>
        @else
            @foreach($news as $new)
                <div class="row">
                    <div class="col-md-12">
                        <div class="Card">
                            <div class="row margin-10">
                                <div class="col-md-3">
                                    @php
                                        $image = $new->photo_id 
                                                    ? $new->photo->getImage() 
                                                    : config('swannportal.path.default-img');
                                    @endphp

                                    <img src="{{$image}}" class="Card__Image">
                                </div>
                                <div class="col-md-9">
                                    <span class="Card__Title">
                                        {{$new->title}}
                                    </span>
                                    <p>
                                        {{ str_limit($new->content, 200) }}
                                    </p>

                                    <a href="{{ route('news.show', $new->id)}}" class="btn btn-primary pull-right"> View Full Story </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        {{$news->render()}}
                    </div>
                </div>
            </div>
        @endif
    </div>
@stop