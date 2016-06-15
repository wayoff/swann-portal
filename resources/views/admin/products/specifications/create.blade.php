@extends('admin.layouts.content')

@section('Page__Description')
    Products / Documents
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-book"></i>  <a href="{{ route('admin.products.index') }}">Products</a>
        </li>
        <li>
            <a href="{{ route('admin.products.{id}.specifications.index', $product->id) }}"> Specifications </a>
        </li>
        <li class="active">
            <a href="#">Update</a>
        </li>
    </ol>
@stop

@section('Content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">Update Specification</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.{id}.specifications.store', $product->id) }}">
                    {!! csrf_field() !!}
                    
                @php 
                    $genSpecifications = $product->specifications()->get();
                @endphp
                @foreach($product->categories as $category)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$category->name}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                @foreach($category->specifications as $specification)
                                    @php
                                        $value = null;
                                    @endphp
                                    @if( $specs = $genSpecifications->where('pivot.specification_id', $specification->id)->first() )
                                        @php
                                            $value = $specs->pivot->value
                                        @endphp
                                    @endif
                                    <div class="form-group">
                                        <label for="">{{ $specification->name }}</label>
                                        <input type="text" class="form-control" name="{{$specification->id}}" placeholder="Enter Value" value="{{ $value }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-table"></i> Submit
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@stop