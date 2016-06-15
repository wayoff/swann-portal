@extends('admin.layouts.content')

@section('Page__Description')
    Specifications
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i>  <a href="#">Specifications</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="row">
        <div class="col-md-8 div col-md-offset-2">
            <a href="{{route('admin.specifications.create')}}" class="pull-right btn btn-primary"> Add </a>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($specifications->isEmpty())
                        <tr>
                            <td colspan="7">
                                <div class="text-center">
                                    No Data was found
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($specifications as $specification)
                            <tr>
                                <td>{{ string_pad($specification->id) }}</td>
                                <td> {{$specification->name}} </td>
                                <td>
                                    {{ $specification->category->name }}
                                </td>
                                <td>
                                    <form action="{{ route('admin.specifications.destroy', $specification->id) }}" method="POST" class="form-inline" role="form">
                                        {!! csrf_field() !!}
                                        {!! method_field('delete') !!}
                                    
                                        <a href="{{ route('admin.specifications.edit', $specification->id) }}" class="btn btn-info btn-xs"> Edit</a>
                                        <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <div class="text-center">
                {{$specifications->render()}}
            </div>
        </div>
    </div>
@stop