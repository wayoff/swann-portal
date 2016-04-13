@extends('admin.layouts.content')

@section('Page__Description')
    Tags
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-edit"></i>  <a href="/admin/tags">Tags</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.tags.create') }}" class="btn btn-primary"> Create New Tag</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if($tags->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">
                            No data was found
                        </td>
                    </tr>
                @else
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{ string_pad($tag->id) }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->description }}</td>
                        <td>

                            <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}
                            
                                <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-info btn-xs"> Edit</a>
                                <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$tags->render()}}
        </div>
    </div>
@stop