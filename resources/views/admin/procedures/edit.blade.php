@extends('admin.layouts.content')

@section('Page__Description')
    Troubleshooting
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
        </li>
        <li>
            <a href="{{route('admin.procedures.index')}}"> Troubleshooting </a>
        </li>
        <li class="active">
            <a href="#" class="active">Edit Procedure</a>
        </li>
    </ol>
@stop

@section('Content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Procedure</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.procedures.update', $procedure->id) }}">
                    {!! csrf_field() !!}
                    {!! method_field('PUT') !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ $procedure->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('procedure_category_id') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Category</label>

                        <div class="col-md-6">
                            <select name="procedure_category_id" class="form-control">
                                <option value="0">Other</option>
                                @foreach($procedureCategories as $category)
                                    <option value="{{$category->id}}"
                                            {{$category->id == $procedure->procedure_category_id ? 'selected' : ''}}
                                    >
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('procedure_category_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('procedure_category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Product</label>

                        <div class="col-md-6">
                            <select name="product[]" multiple class="form-control select2">
                                @foreach($procedure->products as $product)
                                    <option value="{{$product->id}}" selected>{{$product->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('product'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('product') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Tags</label>

                        <div class="col-md-6">
                            <select multiple class="form-control tags" name="tags[]">
                                @foreach($procedure->keywords as $keyword)
                                    <option value="{{$keyword->content}}">{{$keyword->content}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('tags'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tags') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Document</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="document" >

                            @if ($errors->has('document'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('document') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    @if($procedure->document_id)
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Document</label>

                            <div class="col-md-6">
                                <a href="{{$procedure->document->getDocument()}}" target="_blank" class="btn-default btn"/>
                                    View
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-table"></i> Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop


@section('header')
    <link rel="stylesheet" href="/css/select2.css">
@stop

@section('footer')
    <script src="/js/select2.js"></script>
    <script src="/js/procedures.js"></script>
@stop