@extends('admin.layouts.content')

@section('Page__Description')
    Warranties
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-blank"></i>  <a href="/admin/warranties">Warranties</a>
        </li>
        <li class="active">
            <a href="#"> Update Warranty</a>
        </li>
    </ol>
@stop

@section('Content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('admin.warranties.update', $warranty->id) }}">
                    {!! csrf_field() !!}
                    {!! method_field('PUT') !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ $warranty->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Warranty Procedure of </label>

                        <div class="col-md-6">
                            <select  name="countries[]" multiple class="form-control select2">
                                @foreach($policyCategories as $policyCategory)
                                <optgroup label="{{$policyCategory->name}}">
                                    @foreach($policyCategory->children as $child)
                                        <option value="{{$child->id}}"
                                        {{$warranty->categories->where('id', $child->id)->first()
                                            ? 'selected' 
                                            : ''}}
                                        >
                                            {{$child->name}}
                                        </option>
                                    @endforeach
                                </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Document</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="document">

                            @if ($errors->has('document'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('document') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    @if($warranty->document_id)
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Document</label>

                            <div class="col-md-6">
                                <a href="{{ $warranty->document->getDocument() }}" class="btn btn-default" target="_blank"> View</a>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Register
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
    <script>
        $(function() {
            $('.select2').select2();
        });
    </script>
@stop