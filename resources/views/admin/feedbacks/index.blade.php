@extends('admin.layouts.content')

@section('Page__Description')
    Feedbacks
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-file"></i>  <a href="#">Feedbacks</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <form action="{{ url('admin/feedbacks/export') }}" method="POST" role="form" class="pull-right">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success">Export</button>
            <br />
        </form>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($feedbacks->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center">
                            No Feedback yet
                        </td>
                    </tr>
                @else
                    @foreach($feedbacks as $feedback)
                        <tr>
                            <td>{{$feedback->name}}</td>
                            <td>{{$feedback->content}}</td>
                            <td>{{$feedback->created_at}}</td>
                            <td>
                                <form action="{{ route('admin.feedbacks.destroy', $feedback->id) }}" method="POST" class="form-inline" role="form">
                                    {!! csrf_field() !!}
                                    {!! method_field('delete') !!}
                                    <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <div class="col-md-12 text-center">
            {{$feedbacks->render()}}
        </div>
    </div>
@stop