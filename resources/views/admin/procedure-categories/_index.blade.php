@extends('admin.layouts.content')

@section('Page__Description')
    Trouble Shooting Categories
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-table"></i>  <a href="/admin/procedure-categories">Trouble Shooting Categories</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.procedure-categories.create') }}" class="btn btn-primary"> Create New Trouble Shooting Category</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Parent</td>
                    <td>Order</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if(!$procedureCategories->isEmpty())
                    @foreach($procedureCategories as $category)
                    <tr>
                        <td>{{ string_pad($category->id) }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent_id ? $category->parent->name : '' }}</td>
                        <td>{{ $category->order }}</td>
                        <td>

                            <form action="{{ route('admin.procedure-categories.destroy', $category->id) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}
                            
                                <a href="{{ route('admin.procedure-categories.edit', $category->id) }}" class="btn btn-info btn-xs"> Edit</a>
                                <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="4">No Data was Found</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$procedureCategories->render()}}
        </div>
    </div>
@stop