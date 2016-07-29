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
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Content</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @if($feedbacks->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center">
                            No Feedback yet
                        </td>
                    </tr>
                @else
                    @foreach($feedbacks as $feedback)
                        <tr>
                            <td>{{$feedback->name}}</td>
                            <td>{{$feedback->content}}</td>
                            <td>{{$feedback->created_at}}</td>
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