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
            <a href="{{ route('admin.products.{id}.documents.index', $product->id) }}"> {{ $product->name }}</a>
        </li>
        <li class="active">
            <a href="#">Documents</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.products.{id}.documents.create', $product->id) }}" class="btn btn-primary"> Add Document</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Label</td>
                    <td>Description</td>
                    <td>File</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if($documents->count() === 0)
                    <tr>
                        <td colspan="10" class="text-center">
                            No data was found
                        </td>
                    </tr>
                @else
                    @foreach($documents as $document)
                    <tr>
                        <td>{{ string_pad($document->id) }}</td>
                        <td>{{ $document->pivot->label }}</td>
                        <td>{{ $document->pivot->description }}</td>
                        <td>
                                <a href="{{ $document->getDocument() }}" target="_blank" class="btn btn-xs btn-primary"> view </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.products.{id}.documents.destroy', [$product->id, $document->id]) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.products.{id}.documents.edit', [$product->id, $document->id]) }}" class="btn btn-info btn-xs"> Edit</a>
                                <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@stop