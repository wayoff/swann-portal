@extends('admin.layouts.content')

@section('Page__Description')
    Products / Documents
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-book"></i>  <a href="{{ route('admin.products.index') }}">Products</a>
        </li>
        <li class="active">
            <a href="{{ route('admin.products.{id}.specifications.index', $product->id) }}"> Specification for Product : {{$product->name}} </a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.products.{id}.specifications.create', $product->id) }}" class="btn btn-primary"> Update </a>
        </div>
        <table class="table table-hover table-condensed table-bordered">
            <tbody>
                @php 
                    $genSpecifications = $product->specifications()->get();
                @endphp
                @foreach($product->categories as $category)
                    <tr>
                        <td colspan="10">
                            {{ $category->name }}
                        </td>
                    </tr>
                    @if($category->specifications->count() === 0)
                        <tr>
                            <td colspan="10" class="text-center">
                                No specification
                            </td>
                        </tr>
                    @else
                        @foreach($category->specifications as $specification)
                            <tr>
                                <td>{{ string_pad($specification->id) }}</td>
                                <td>{{ $specification->name}}</td>
                                @if($specs = $genSpecifications->where('pivot.specification_id', $specification->id)->first())
                                    <td>
                                        @if($specs->pivot->link_to)
                                            <a href="{{$specs->pivot->link_to}}" target="_blank">
                                                {{$specs->pivot->value}}
                                            </a>
                                        @else
                                            {{$specs->pivot->value}}
                                        @endif
                                    </td>
                                @else
                                    <td> None </td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@stop