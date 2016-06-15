@extends('layouts.descriptive-content')

@section('Page__Title', $product->name)
@section('Title', $product->name)

@section('Page__BreadCrumbs')
    <ol class="breadcrumb">
        @foreach($product->categories as $category)
            <li>
                <a href="{{route('categories.{id}.products.index', $category->id)}}">
                    {{$category->name}}
                </a>
            </li>
        @endforeach
        <li class="active">
            <a href="#">{{$product->name}}</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4 Product__Show-Image--Container padding-remove">
                <div class="row">
                    <div class="col-md-12">
                        <div id="zoom">
                            <img 
                                src="{{ $product->photo_id ? $product->photo->getImage() : default_img() }}"
                                alt="" 
                                class="Product__Show-Image" 
                                id="Product__Show-Image-active">
                        </div>
                    </div>
                    <div class="col-md-12">
                        @php
                            $photos = $product->photos;
                        @endphp
                        @if($product->photo_id)
                            @php
                                $photos->prepend($product->photo);
                            @endphp
                        @endif
                        @foreach($product->photos as $photo)
                            <div class="col-xs-3 col-md-3 padding-remove text-center">
                                <img src="{{$photo->getImage()}}" class="thumbnail thumbnail-fix vcenter Product__Photos">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 padding-remove">
                <ul class="list-unstyled">
                    <li>Product: <strong>{{$product->name}}</strong></li>
                    <li>Product Model: <strong>{{$product->model_no}}</strong></li>
                </ul>
                {!!$product->description!!}
            </div>
        </div>
        <div class="col-md-12">
            <div>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active"><a href="#desciption" aria-controls="desciption" role="tab" data-toggle="tab">Specifications</a></li>
                <li role="presentation"><a href="#faq" aria-controls="faq" role="tab" data-toggle="tab">FAQ</a></li>
                <li role="presentation"><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Manual</a></li>
                <li role="presentation"><a href="#procedures" aria-controls="procedures" role="tab" data-toggle="tab">Troubleshooting</a></li>
                <li role="presentation"><a href="#screenshots" aria-controls="screenshots" role="tab" data-toggle="tab">Screenshots</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="desciption">
                    @php 
                        $genSpecifications = $product->specifications()->get();
                    @endphp
                    @foreach($product->categories as $category)
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ $category->name }}</h3>
                            </div>
                            <div class="panel-body">
                                @if($category->specifications->count() === 0)
                                    <div class="alert alert-info">
                                        No specification
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <tbody>
                                                @foreach($category->specifications as $specification)
                                                    <tr>
                                                        <td>{{ $specification->name}}</td>
                                                        @if($specs = $genSpecifications->where('pivot.specification_id', $specification->id)->first())
                                                            <td>{{$specs->pivot->value}}</td>
                                                        @else
                                                            <td> None </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div role="tabpanel" class="tab-pane" id="faq">
                    @if($product->questions->isEmpty() && $product->otherQuestions->isEmpty())
                        <div class="alert alert-info">
                            No FAQ was Added
                        </div>
                    @else
                        @php
                            $questions = $product->questions;

                            if(!$product->otherQuestions->isEmpty()) :
                                $questions = $questions->merge($product->otherQuestions);
                            endif;
                        @endphp
                        @include('partials.questions')
                    @endif
                </div>
                <div role="tabpanel" class="tab-pane" id="documents">
                    @if($product->document_id)
                        <a href="{{ $product->document->getDocument() }}" class="btn btn-primary" target="_blank">
                            Product Document
                        </a>
                    @endif
                    @php
                        $documents = $product->documents()->get();
                    @endphp
                    @if(!$documents->isEmpty())
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Label</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $documents as $document)
                                        <tr>
                                            <td>{{ $document->pivot->label }}</td>
                                            <td>{{ $document->pivot->description }}</td>
                                            <td>
                                                <a href="{{ $document->getDocument() }}" target="_blank" class="btn btn-xs btn-primary"> View </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    @if(!$product->document_id && $documents->isEmpty())
                        <div class="alert alert-info">
                            No Supporting Document
                        </div>
                    @endif

                </div>
                <div role="tabpanel" class="tab-pane" id="procedures">
                    @php
                        $procedures = $product->procedures;
                        
                        if(!$product->troubleShooting->isEmpty()) :
                            $troubleshootings = $product->troubleShooting;
                            $procedures = $procedures->merge($troubleshootings);
                        endif;
                    @endphp
                    @if(!$procedures->isEmpty())
                        @include('partials.troubleshooting')
                    @else
                        <div class="alert alert-info">
                            No Supported Manual
                        </div>
                    @endif
                </div>
                <div role="tabpanel" class="tab-pane" id="screenshots">
                    @include('partials.screenshots')
                </div>
              </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script src="/js/jquery.zoom.min.js"></script>
    <script>
        $(document).ready( function() {
            var target = $('#zoom_container').get(0);

            var zoomable = function() {
                $('#zoom').zoom({
                    magnify: 1.1,
                });
            }

            $('.Product__Photos').on('click', function() {
                var source = $(this).attr('src');

                $('#Product__Show-Image-active').attr('src', source);
                $('#zoom').trigger('zoom.destroy');
                zoomable();
            });

            zoomable();
        });
    </script>
@stop