@extends('admin.layouts.content')

@section('Page__Description')
    Videos
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-file"></i>  <a href="{{ route('admin.videos.index') }}">Videos</a>
        </li>
        <li class="active">
            <a href="#">Add Video</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Video</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.videos.store') }}">
                        {!! csrf_field() !!}

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop