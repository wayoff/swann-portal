@extends('admin.layouts.content')

@section('Page__Description')
    Commendations
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-users"></i>  <a href="/admin/commendations">Commendations</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.commendations.create') }}" class="btn btn-primary"> Create New Commendation</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Testimonial</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if(!$commendations->isEmpty())
                    @foreach($commendations as $commendation)
                    <tr>
                        <td>{{ string_pad($commendation->id) }}</td>
                        <td class="text-center">
                            <img src="{{$commendation->photo->getImage()}}" class="image-max-width-200" alt="" />
                        </td>
                        <td>{{ $commendation->name }}</td>
                        <td>{{ $commendation->testimonial }}</td>
                        <td>
                            <form action="{{ route('admin.commendations.destroy', $commendation->id) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.commendations.edit', $commendation->id) }}" class="btn btn-info btn-xs"> Edit</a>
                                <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="10">No Data was Found</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="text-center">
            {{$commendations->render()}}
        </div>
    </div>
@stop