@extends('admin.layouts.content')

@section('Page__Description')
    Products
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-book"></i>  <a href="#">Products</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary"> Add Product</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Category</td>
                    <td>Name</td>
                    <td>Model No</td>
                    <td>Description</td>
                    <td>Featured</td>
                    <td>Image</td>
                    <td>Document</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if($products->isEmpty())
                    <tr>
                        <td colspan="10" class="text-center">
                            No data was found
                        </td>
                    </tr>
                @else
                    @foreach($products as $product)
                    <tr>
                        <td>{{ string_pad($product->id) }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->model_no }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->featured ? 'Yes' : 'No' }}</td>
                        <td>
                            @if($product->photo_id)
                                <img src="{{ $product->photo->getImage() }}" alt="" class="image-max-width-200">
                            @else
                                No Photo Available
                            @endif
                        </td>
                        <td>
                            @if($product->document_id)
                                <a href="{{ $product->document->getDocument() }}" target="_blank" class="btn btn-xs btn-primary"> view </a>
                            @else
                                No Document Available
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.products.{id}.questions.index', $product->id) }}" class="btn btn-xs btn-primary"> questions</a>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info btn-xs"> Edit</a>
                                <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$products->render()}}
        </div>
    </div>
@stop