@extends('admin.layouts.content')

@section('Page__Description')
    Products / Procedures
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-book"></i>  <a href="{{ route('admin.products.index') }}">Products</a>
        </li>
        <li>
            <a href="{{ route('admin.products.{id}.procedures.index', $product->id) }}"> {{ $product->name }}</a>
        </li>
        <li class="active">
            <a href="#">Procedures</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.products.{id}.procedures.create', $product->id) }}" class="btn btn-primary"> Add Procedures</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Document</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if($procedures->isEmpty())
                    <tr>
                        <td colspan="10" class="text-center">
                            No data was found
                        </td>
                    </tr>
                @else
                    @foreach($procedures as $procedure)
                    <tr>
                        <td>{{ string_pad($procedure->id) }}</td>
                        <td>{{ $procedure->name }}</td>
                        <td>
                            @if($procedure->document_id)
                                <a href="{{ $procedure->document->getDocument() }}" target="_blank" class="btn btn-xs btn-primary"> view </a>
                            @else
                                No Document Available
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.products.{id}.procedures.destroy', [$product->id, $procedure->id]) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.products.{id}.procedures.edit', [$product->id, $procedure->id]) }}" class="btn btn-info btn-xs"> Edit</a>
                                <a href="{{ route('admin.products.{id}.procedures.{procedureId}.steps.index', [$product->id, $procedure->id]) }}" class="btn btn-primary btn-xs"> Steps</a>
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