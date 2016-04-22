@extends('admin.layouts.content')

@section('Page__Description')
    Policy Categories
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-table"></i>  <a href="/admin/policy-categories">Policy Categories</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.policy-categories.create') }}" class="btn btn-primary"> Create New Policy Category</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Order</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if(!$policyCategories->isEmpty())
                    @foreach($policyCategories as $policyCategory)
                    <tr>
                        <td>{{ string_pad($policyCategory->id) }}</td>
                        <td>{{ $policyCategory->name }}</td>
                        <td>
                            {{ $policyCategory->order }}
                        </td>
                        <td>

                            <form action="{{ route('admin.policy-categories.destroy', $policyCategory->id) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}
                            
                                <a href="{{ route('admin.policy-categories.edit', $policyCategory->id) }}" class="btn btn-info btn-xs"> Edit</a>
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
            {{$policyCategories->render()}}
        </div>
    </div>
@stop