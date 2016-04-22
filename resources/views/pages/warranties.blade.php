@extends('layouts.descriptive-content')

@section('Page__Title', 'Warranties for: ' . $policyCategory->parent->name . ' - ' . $policyCategory->name)

@section('Page__BreadCrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('home') }}">Home</a>
        </li>
        <li class="active">
            <a href="#"> Warranties </a>
        </li>
    </ol>
@stop
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="list-group">
            @if(!$warranties->isEmpty())
                @foreach($warranties as $warranty)
                    <a href="{{$warranty->document->getDocument()}}" target="_blank" class="list-group-item">
                        <h6 class="list-group-item-heading">
                            {{$warranty->name}}
                        </h6>
                    </a>
                @endforeach
            @else
                <div class="alert alert-info">
                    No Warranty was found
                </div>
            @endif
        </div>
    </div>
</div>
@stop