@extends('admin.layouts.content')

@section('Page__Description')
    Products / Questions
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-book"></i>  <a href="{{ route('admin.questions.products.index') }}">Questions</a>
        </li>
        <li class="active">
            <a href="#"> Edit Question</a>
        </li>
    </ol>
@stop

@section('Content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Question</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.questions.products.update', [$question->id]) }}">
                    {!! csrf_field() !!}
                    {!! method_field('PUT') !!}

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Title</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="title" value="{{ $question->title }}">

                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Answer</label>

                        <div class="col-md-8">
                            <textarea name="answer" class="form-control" id="target_tinymce">{!! $question->answer !!}</textarea>
                            @if ($errors->has('answer'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('answer') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Category</label>

                        <div class="col-md-8">
                            <select name="category" class="form-control">
                                <option value="">Other</option>
                                @foreach($faqCategories as $faqCategory)
                                    <option 
                                        value="{{ $faqCategory->id }}"
                                        {{$question->faq_category_id == $faqCategory->id ? 'selected' : ''}}
                                    >
                                        {{$faqCategory->name}}
                                    </option>
                                @endforeach;
                            </select>
                            @if ($errors->has('answer'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('answer') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Product</label>

                        <div class="col-md-8">
                            <select name="product[]" multiple class="form-control select2">
                                @foreach($question->products as $product)
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
                        <label class="col-md-2 control-label">Tags</label>

                        <div class="col-md-8">
                            <select multiple class="form-control tags" name="tags[]">
                                @foreach($question->keywords as $keyword)
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

                    <div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">is Featured ? </label>

                        <div class="col-md-8">
                            <select name="featured" id="" class="form-control">
                                <option value="0"> No </option>
                                <option value="1" {{ $question->featured ? 'selected' : '' }}> Yes </option>
                            </select>

                            @if ($errors->has('featured'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('featured') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Document</label>

                        <div class="col-md-8">
                            <input type="file" class="form-control" name="document" >

                            @if ($errors->has('document'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('document') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    @if($question->document_id)
                        <div class="form-group">
                            <label class="col-md-2 control-label">Current Document</label>

                            <div class="col-md-8">
                                <a href="{{ $question->document->getDocument() }}" class="btn btn-default" target="_blank"> {{ $question->document->name . '.' . $question->document->extension }}</a>
                            </div>
                        </div>
                    @endif


                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
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