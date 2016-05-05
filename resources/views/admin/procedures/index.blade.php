@extends('admin.layouts.content')

@section('Page__Description')
    Troubleshooting
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
        </li>
        <li class="active">
            <a href="#"> Troubleshooting </a>
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
                    <td>Category</td>
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
                        <td>
                            {{ $procedure->name }}
                            
                              <div class="btn-group" role="group">
                                @foreach($procedure->products as $product)
                                <a href="#" class="btn btn-default">{{$product->name}}</a>
                                @endforeach
                              </div>
                        </td>
                        <td>
                            @if($procedure->procedure_category_id)
                                {{$procedure->procedureCategory->name}}
                            @else
                                Other
                            @endif
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
                                <a href="{{ route('admin.procedures.{id}.decisions.index', $procedure->id) }}" class="btn btn-primary btn-xs"> Decision Tree</a>
                                
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