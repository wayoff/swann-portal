@extends('admin.layouts.content')

@section('Page__Description')
    Sliders
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-table"></i>  <a href="/admin/sliders">Sliders</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary"> Create New Slider</a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if(!$sliders->isEmpty())
                    @foreach($sliders as $slider)
                    <tr>
                        <td>{{ string_pad($slider->id) }}</td>
                        <td class="text-center">
                            <img src="{{$slider->photo->getImage()}}" class="image-max-width-200" alt="" />
                        </td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->description }}</td>
                        <td>
                            <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="form-inline" role="form">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}

                                <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-info btn-xs"> Edit</a>
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
    </div>
@stop