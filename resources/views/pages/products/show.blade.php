@extends('layouts.descriptive-content')

@section('Page__Title', $product->name)

@section('Page__BreadCrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="{{route('categories.{id}.products.index', $category->id)}}">
                {{$category->name}}
            </a>
        </li>
        <li class="active">
            <a href="#">{{$product->name}}</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 Product__Show-Image--Container">
                <img src="{{ $product->photo_id ? $product->photo->getImage() : default_img() }}" alt="" class="Product__Show-Image">
            </div>
            <div class="col-md-4">
                @include('partials.list-random-products')
            </div>
        </div>
        <div class="col-md-12">
            <div>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#desciption" aria-controls="desciption" role="tab" data-toggle="tab">Description</a></li>
                <li role="presentation"><a href="#faq" aria-controls="faq" role="tab" data-toggle="tab">FAQ</a></li>
                <li role="presentation"><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Document</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="desciption">
                    <p class="Product__Show--description">
                        Product Description: 
                        <br />
                        <strong> {{$product->description}}</strong>
                        <br />
                        <br />
                        Product Model: <strong>{{$product->model_no}}</strong>
                    </p>
                </div>
                <div role="tabpanel" class="tab-pane" id="faq">
                    @if($product->questions->isEmpty())
                        <div class="alert alert-info">
                            No FAQ was Added
                        </div>
                    @else
                        <?php $questions = $product->questions; ?>
                        @include('partials.questions')
                    @endif
                </div>
                <div role="tabpanel" class="tab-pane" id="documents">
                    @if($product->document_id)
                        <a href="{{ $product->document->getDocument() }}" class="btn btn-primary" target="_blank">
                            Product Document
                        </a>
                    @else
                        <div class="alert alert-info">
                            No Supported Document
                        </div>
                    @endif
                </div>
              </div>
            </div>
        </div>
    </div>
@stop