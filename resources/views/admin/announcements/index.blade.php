@extends('admin.layouts.content')

@section('Page__Description')
    Announcements
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-exclamation-circle"></i>  <a href="#">Announcements</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary"> Add Announcements</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Content</td>
                    <td>End Date</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if($announcements->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">
                            No data was found
                        </td>
                    </tr>
                @else
                    @foreach($announcements as $announcement)
                    <tr>
                        <td>{{ string_pad($announcement->id) }}</td>
                        <td>{{ $announcement->content }}</td>
                        <td>{{ $announcement->end_date }}</td>
                        <td>
                            <form action="{{ route('admin.announcements.destroy', $announcement->id) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="btn btn-info btn-xs"> Edit</a>
                                <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$announcements->render()}}
        </div>
    </div>
@stop