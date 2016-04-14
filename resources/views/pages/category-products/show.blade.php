@extends('layouts.descriptive-content')

@section('Page__Title', $product->name)

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
              <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active"><a href="#desciption" aria-controls="desciption" role="tab" data-toggle="tab">Specifications</a></li>
                <li role="presentation"><a href="#faq" aria-controls="faq" role="tab" data-toggle="tab">FAQ</a></li>
                <li role="presentation"><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Manual</a></li>
                <li role="presentation"><a href="#procedures" aria-controls="procedures" role="tab" data-toggle="tab">Trouble Shooting</a></li>
                <li role="presentation"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Videos</a></li>
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
                    @else
                        <div class="alert alert-info">
                            No Supported Document
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
                        @foreach($procedures as $procedure)
                            <div class="Product__Show--Procedure-Container">
                                <span class="Product__Show--Procedure-Title None"> 
                                    {{ $procedure->name }}
                                    <button class="pull-right btn btn-xs btn-primary" data-toggle="collapse" data-target="#procedure_{{$procedure->id}}"> Toggle </button>
                                </span>
                                <div class="row">
                                    <div class="col-md-12 padding-10">
                                        @if($procedure->document_id)
                                            <a href="{{$procedure->document->getDocument()}}" class="btn btn-primary margin-10"> View Supporting Document</a>
                                            <br />
                                        @endif
                                    </div>
                                    <div id="procedure_{{ $procedure->id }}" class="collapse">
                                        @foreach($procedure->steps as $key => $step)
                                            <div class="col-md-12">
                                                <div class="Product__Show--Step-Container Question">
                                                    <div class="row">
                                                        <div class="col-md-2 padding-remove">
                                                            <div class="Question__Number--Container">
                                                                <span class="Question__Number">{{$key + 1}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 padding-remove">
                                                            <span class="Product__Show--Step-Title"> {{ $step->title }}</span>

                                                            <div class="Product__Show--Step-Content">
                                                                <p>{{$step->content}}</p>
                                                                <div>
                                                                    @if($step->document_id)
                                                                        <a href="{{$step->document->getDocument()}}" class="btn btn-primary margin-10"> View Supporting Document</a>
                                                                        <br />
                                                                    @endif
                                                                    @if($step->photo_id)
                                                                        <img src="{{$step->photo->getImage()}}" alt="" class="Product__Show--Step-Content-Image">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info">
                            No Supported Manual
                        </div>
                    @endif
                </div>
                <div role="tabpanel" class="tab-pane" id="videos">
                    @php
                        $videos = $product->videos;
                    @endphp
                    @if(!$videos->isEmpty())
                        @foreach($videos as $video)
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 Video">
                                    <h4 class="Video__Title">{{ $video->title }}</h4>
                                    <hr />
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video class="embed-responsive-item Video__Iframe" 
                                            controls 
                                            poster="/img/swann-logo.png"
                                        >
                                          <source src="{{ $video->getMP4() }}" type="video/mp4">
                                          <source src="{{ $video->getOGG() }}" type="video/ogg">
                                          Your browser does not support HTML5 video.
                                        </video>
                                    </div>
                                    <hr />
                                    <p class="Video__Description">
                                        {{ $video->description }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info">
                            No Videos
                        </div>
                    @endif
                </div>
              </div>
            </div>
        </div>
    </div>
@stop