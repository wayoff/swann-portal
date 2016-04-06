@extends('admin.layouts.content')

@section('Page__Description')
    Products / Procedures / Steps
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-book"></i>  <a href="{{ route('admin.products.index') }}">Products</a>
        </li>
        <li>
            <a href="{{ route('admin.products.{id}.procedures.index', $product->id) }}"> {{ $product->name }}</a>
        </li>
        <li>
            <a href="{{ route('admin.products.{id}.procedures.index', $product->id) }}"> {{$procedure->name}} </a>
        </li>
        <li class="active">
            <a href="#">Steps</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.products.{id}.procedures.{procedureId}.steps.create', [$product->id, $procedure->id]) }}" class="btn btn-primary"> Add Step</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Content</td>
                    <td>Photo</td>
                    <td>Document</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if($steps->isEmpty())
                    <tr>
                        <td colspan="10" class="text-center">
                            No data was found
                        </td>
                    </tr>
                @else
                    @foreach($steps as $step)
                        <tr>
                            <td>{{ string_pad($step->id) }}</td>
                            <td>{{ str_limit($step->title, 60) }}</td>
                            <td>{{ str_limit($step->content, 60) }}</td>
                            <td>
                                @if($step->photo_id)
                                    <img src="{{ $step->photo->getImage() }}" alt="" class="image-max-width-200">
                                @else
                                    No Photo Available
                                @endif
                            </td>
                            <td>
                                @if($step->document_id)
                                    <a href="{{ $step->document->getDocument() }}" target="_blank" class="btn btn-xs btn-primary"> view </a>
                                @else
                                    No Document Available
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.products.{id}.procedures.{procedureId}.steps.destroy', [$product->id, $procedure->id, $step->id]) }}" method="POST" class="form-inline" role="form">
                                    {!! csrf_field() !!}
                                    {!! method_field('delete') !!}

                                    <a href="{{ route('admin.products.{id}.procedures.{procedureId}.steps.edit', [$product->id, $procedure->id, $step->id]) }}" class="btn btn-info btn-xs"> Edit</a>
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