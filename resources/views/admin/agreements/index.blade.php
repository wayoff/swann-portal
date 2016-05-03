@extends('admin.layouts.content')

@section('Page__Description')
    Terms & Agreement
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-file"></i>  <a href="#">Terms & Agreement</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.agreements.create') }}" class="btn btn-primary"> Add Terms & Agreement</a>
        </div>

        <table class="table table-striped table-border">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Content</td>
                    <td>Document</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @if($agreements->isEmpty())
                    <tr>
                        <td colspan="6">
                            <div class="alert alert-info">
                                No Data was Found
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach($agreements as $agreement)
                        <tr>
                            <td>{{string_pad($agreement->id)}}</td>
                            <td>{{$agreement->title}}</td>
                            <td>{{str_limit($agreement->content, 100)}}</td>
                            <td>
                                @if($agreement->document_id)
                                    <a href="{{$agreement->document->getDocument()}}" target="_blank" class="btn btn-default">
                                        View
                                    </a>
                                @else
                                    No Document
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.agreements.destroy', $agreement->id) }}" method="POST" class="form-inline" role="form">
                                    {!! csrf_field() !!}
                                    {!! method_field('delete') !!}

                                    <a href="{{ route('admin.agreements.edit', $agreement->id) }}" class="btn btn-info btn-xs"> Edit</a>
                                    <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <div class="col-md-12 text-center">
            {{$agreements->render()}}
        </div>
    </div>
@stop