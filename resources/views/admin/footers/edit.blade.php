@extends('admin.layouts.content')

@section('Page__Description')
    Dashboard
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-file"></i>  <a href="/admin/footers">Footer</a>
        </li>
        <li class="active">
            <a href="#">Update Footer Content</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Update Footer Content</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.footers.update', $footer->id) }}">
                        {!! csrf_field() !!}
                        {!! method_field('put') !!}


                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <textarea name="content" id="target_tinymce" class="form-control" >{{ $footer->content }}</textarea>

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-table"></i> Update
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop