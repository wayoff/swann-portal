@extends('admin.layouts.content')

@section('Page__Description')
    Questions for Products
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-book"></i>  <a href="{{ route('admin.questions.products.index') }}"> Questions</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.questions.products.create') }}" class="btn btn-primary"> Add Question</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Question</td>
                    <td>Products</td>
                    <td>Answer</td>
                    <td>Featured</td>
                    <td>Document</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if($questions->isEmpty())
                    <tr>
                        <td colspan="10" class="text-center">
                            No data was found
                        </td>
                    </tr>
                @else
                    @foreach($questions as $question)
                    <tr>
                        <td>{{ string_pad($question->id) }}</td>
                        <td>{{ $question->title }}</td>
                        <td>
                            <ul class="list-group">
                                @foreach($question->products as $product)
                                <li class="list-group-item">{{$product->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $question->answer }}</td>
                        <td>{{ $question->featured ? 'Yes' : 'No' }}</td>
                        <td>
                            @if($question->document_id)
                                <a href="{{ $question->document->getDocument() }}" target="_blank" class="btn btn-xs btn-primary"> view </a>
                            @else
                                No Document Available
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.questions.products.destroy', [$question->id]) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.questions.products.edit', [$question->id]) }}" class="btn btn-info btn-xs"> Edit</a>
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