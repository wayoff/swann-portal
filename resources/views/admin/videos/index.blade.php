@extends('admin.layouts.content')

@section('Page__Description')
    Videos
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-file"></i>  <a href="#">Videos</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.videos.create') }}" class="btn btn-primary"> Add Video</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Associated</td>
                    <td>Featured</td>
                    <td>Video</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if($videos->isEmpty())
                    <tr>
                        <td colspan="10" class="text-center">
                            No data was found
                        </td>
                    </tr>
                @else
                    @foreach($videos as $video)
                    <tr>
                        <td>{{ string_pad($video->id) }}</td>
                        <td>{{ $video->title }}</td>
                        <td>{{ $video->description }}</td>
                        <td>{{ $video->news ? 'News' : 'None' }}</td>
                        <td>
                            {{ $video->featured ? 'Yes' : 'No' }}
                        </td>
                        <td>
                            @if($video->converted)
                                <div align="center">
                                    <video width="320" height="240" controls>
                                      <source src="{{ $video->getOGG() }}" type="video/ogg">
                                      <source src="{{ $video->getMP4() }}" type="video/mp4">
                                      Your browser does not support HTML5 video.
                                    </video>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    Video is still converting for better support...
                                </div>
                            @endif
                        </td>
                        <td>

                            <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-info btn-xs"> Edit</a>
                                <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="text-center col-md-12">
            {{$videos->render()}}
        </div>
    </div>
@stop