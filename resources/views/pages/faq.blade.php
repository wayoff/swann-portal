
@extends('layouts.descriptive-content')

@section('Page__Title', 'Frequently Asked Question')

@section('Page__BreadCrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('home') }}">Home</a>
        </li>
        <li class="active">
            <a href="{{ url('faq') }}"> FAQ </a>
        </li>
    </ol>
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        @if($questions->isEmpty())
            <div class="alert alert-info">
                No FAQ was Added
            </div>
        @else
            @include('partials.questions')
        @endif
    </div>
</div>
@stop