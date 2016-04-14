@extends('admin.layouts.content')

@section('Page__Description')
    FAQ's Categories
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-table"></i>  <a href="/admin/faq-categories">FAQ's Categories</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.faq-categories.create') }}" class="btn btn-primary"> Create New FAQ's Category</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if(!$faqCategories->isEmpty())
                    @foreach($faqCategories as $category)
                    <tr>
                        <td>{{ string_pad($category->id) }}</td>
                        <td>{{ $category->name }}</td>
                        <td>

                            <form action="{{ route('admin.faq-categories.destroy', $category->id) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}
                            
                                <a href="{{ route('admin.faq-categories.edit', $category->id) }}" class="btn btn-info btn-xs"> Edit</a>
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
            {{$faqCategories->render()}}
        </div>
    </div>
@stop