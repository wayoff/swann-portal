@extends('layouts.descriptive-content')

@section('Page__Title', 'News & Updates')

@section('content')
    <div class="row">
        @if($news->isEmpty())
            <div class="alert alert-info">
                No News yet
            </div>
        @else
            @foreach($news->chunk(2) as $chunks)
                <div class="row">
                    @foreach($chunks as $new)
                        <div class="col-md-6">
                            <div class="Card">
                                <span class="Card__Title">
                                    {{$new->title}}
                                </span>
                                <p>
                                    {{ str_limit($new->content, 200) }}
                                </p>

                                <a href="{{ route('news.show', $new->id)}}" class="btn btn-primary btn-block"> View Full Story </a>
                            </div>
                        </div>
                    @endforeach
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