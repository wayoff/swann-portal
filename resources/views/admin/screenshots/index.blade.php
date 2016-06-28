@extends('admin.layouts.content')

@section('Page__Description')
    Screenshots
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i>  <a href="#">Screenshots</a>
        </li>
    </ol>
@stop

@section('Content')
    <style>
    .img--50 {
        width: 150px;
        height: 150px;
    }
    </style>
    <div class="row">
        <div class="col-md-10 div col-md-offset-1">
            <a href="{{route('admin.screenshots.create')}}" class="pull-right btn btn-primary"> Add </a>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($screenshots->isEmpty())
                        <tr>
                            <td colspan="7">
                                <div class="text-center">
                                    No Data was found
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($screenshots as $screenshot)
                            <tr>
                                <td>{{ string_pad($screenshot->id) }}</td>
                                <td> {{$screenshot->name}} </td>
                                <td>
                                    <img src="{{$screenshot->photo->getImage()}}" alt="" class="img--50">
                                </td>
                                <td>
                                    {{ $screenshot->category->name }}
                                </td>
                                <td>
                                      <div class="btn-group" role="group">
                                        @foreach($screenshot->products as $product)
                                        <a href="#" class="btn btn-default">{{$product->name}}</a>
                                        @endforeach
                                      </div>
                                </td>
                                <td>
                                    {{ $screenshot->order }}
                                </td>
                                <td>
                                    
                                    <form action="{{ route('admin.screenshots.destroy', $screenshot->id) }}" method="POST" class="form-inline" role="form">
                                        {!! csrf_field() !!}
                                        {!! method_field('delete') !!}
                                    
                                        <a href="{{ route('admin.screenshots.edit', $screenshot->id) }}" class="btn btn-info btn-xs"> Edit</a>
                                        <button type="submit" class="btn btn-warning btn-xs btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <div class="text-center">
                {!! $screenshots->render() !!}
            </div>
        </div>
    </div>
@stop