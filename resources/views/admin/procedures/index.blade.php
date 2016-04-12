@extends('admin.layouts.content')

@section('Page__Description')
    Trouble Shooting
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
        </li>
        <li class="active">
            <a href="#"> Trouble Shooting </a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.procedures.create') }}" class="btn btn-primary"> Add Procedures</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Products</td>
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
                            <ul class="list-group">
                                @foreach($procedure->products as $product)
                                <li class="list-group-item">{{$product->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @if($procedure->document_id)
                                <a href="{{ $procedure->document->getDocument() }}" target="_blank" class="btn btn-xs btn-primary"> view </a>
                            @else
                                No Document Available
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.procedures.destroy', $procedure->id) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.procedures.edit', $procedure->id) }}" class="btn btn-info btn-xs"> Edit</a>
                                <a href="{{ route('admin.procedures.{id}.steps.index', $procedure->id) }}" class="btn btn-primary btn-xs"> Steps</a>
                                
                                <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="col-md-12 text-center">
            {{$procedures->render()}}
        </div>
    </div>
@stop