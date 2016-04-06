@extends('admin.layouts.content')

@section('Page__Description')
    Products / Videos
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-book"></i>  <a href="{{ route('admin.products.index') }}">Products</a>
        </li>

        <li>
            <a href="#">{{ $product->name }}</a>
        </li>

        <li>
            <a href="{{ route('admin.products.{id}.videos.index', $product->id) }}"> Videos </a>
        </li>
        <li class="active">
            <a href="#"> Create Video</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Video</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.{id}.videos.index', $product->id) }}">
                        {!! csrf_field() !!}

                        @include('admin.partials.videos.create-form')

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop