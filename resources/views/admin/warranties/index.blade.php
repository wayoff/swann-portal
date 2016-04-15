@extends('admin.layouts.content')

@section('Page__Description')
    Warranties
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-book"></i>  <a href="{{ route('admin.warranties.index') }}"> Warranties</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.warranties.create') }}" class="btn btn-primary"> Add Warranty</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Warranty</td>
                    <td>File</td>
                    <td>Warranty Procedure</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if($warranties->isEmpty())
                    <tr>
                        <td colspan="10" class="text-center">
                            No data was found
                        </td>
                    </tr>
                @else
                    @foreach($warranties as $warranty)
                    <tr>
                        <td>{{ string_pad($warranty->id) }}</td>
                        <td>{{ $warranty->name }}</td>
                        <td>
                            @if($warranty->document_id)
                                <a href="{{ $warranty->document->getDocument() }}" target="_blank" class="btn btn-xs btn-primary"> view </a>
                            @else
                                No Document Available
                            @endif
                        </td>
                        <td>
                            <?php 
                                switch ($warranty->warranty_procedure) {
                                    case 1:
                                        echo 'Australia';
                                        break;
                                    case 2:
                                        echo 'United Kingdom';
                                        break;
                                    case 3:
                                        echo 'United States';
                                        break;
                                }
                            ?>
                        </td>
                        <td>
                            <form action="{{ route('admin.warranties.destroy', [$warranty->id]) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.warranties.edit', [$warranty->id]) }}" class="btn btn-info btn-xs"> Edit</a>
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