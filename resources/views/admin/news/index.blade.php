@extends('admin.layouts.content')

@section('Page__Description')
    News
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-file"></i>  <a href="#">News</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary"> Add News</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Content</td>
                    <td>Image</td>
                    <td>Document</td>
                    <td>Video</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if($news->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">
                            No data was found
                        </td>
                    </tr>
                @else
                    @foreach($news as $new)
                    <tr>
                        <td>{{ string_pad($new->id) }}</td>
                        <td>{{ str_limit($new->title, 70) }}</td>
                        <td>{{ str_limit($new->content, 120) }}</td>
                        <td>
                            @if($new->photo_id)
                                <img src="{{ $new->photo->getImage() }}" alt="" class="image-max-width-200">
                            @else
                                No Photo Available
                            @endif
                        </td>
                        <td>
                            @if($new->document_id)
                                <a href="{{$new->document->getDocument()}}" 
                                    target="_blank" 
                                    class="btn btn-default">
                                    Document
                                </a>
                            @else
                                No Document Available
                            @endif
                        </td>
                        <td>
                            @if($new->video_id)
                                @if($new->video->converted)
                                    <div align="center">
                                        <video width="320" height="240" controls>
                                          <source src="{{ $new->video->getOGG() }}" type="video/ogg">
                                          <source src="{{ $new->video->getMP4() }}" type="video/mp4">
                                          Your browser does not support HTML5 video.
                                        </video>
                                    </div>
                                @else
                                    <div class="alert alert-info">
                                        Video is still converting for better support...
                                    </div>
                                @endif
                            @else
                                No Video Available
                            @endif
                        </td>
                        <td>

                            <form action="{{ route('admin.news.destroy', $new->id) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-info btn-xs"> Edit</a>
                                <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$news->render()}}
        </div>
    </div>
@stop