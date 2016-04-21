@extends('admin.layouts.content')

@section('Page__Description')
    Products / Photos
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-book"></i>  <a href="{{ route('admin.products.index') }}">Products</a>
        </li>
        <li class="active">
            <a href="{{ route('admin.products.{id}.photos.index', $product->id) }}">Photos</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.products.{id}.photos.create', $product->id) }}" class="btn btn-primary"> Add Photo</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if($photos->count() === 0)
                    <tr>
                        <td colspan="10" class="text-center">
                            No data was found
                        </td>
                    </tr>
                @else
                    @foreach($photos as $photo)
                    <tr>
                        <td>{{ string_pad($photo->id) }}</td>
                        <td class="text-center">
                            <img class="image-max-width-200" src="{{$photo->getImage()}}" alt="Image">
                        </td>
                        <td>
                            <form action="{{ route('admin.products.{id}.photos.destroy', [$product->id, $photo->id]) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.products.{id}.photos.edit', [$product->id, $photo->id]) }}" class="btn btn-info btn-xs"> Edit</a>
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