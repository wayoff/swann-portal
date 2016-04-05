@extends('layouts.descriptive-content')

@section('Page__Title', $category->name)

@section('content')
    <div class="container">
        @if($products->isEmpty())
            <div class="alert alert-warning">
                <strong>No Product for: <i>{{$category->name}}</i></strong>
            </div>
        @else
            <div class="row">
              <div class="col-md-12 text-center">
                  <form class="navbar-form" action="{{route('categories.{id}.products.index', $category->id)}}" role="search">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search" name="q" value="{{$q}}">
                          <div class="input-group-btn">
                              <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                      </div>
                  </form>
              </div>
            </div>
            @include('partials.tile-products')
        @endif

        <div class="text-center">
            <hr />
            {{$products->render()}}
        </div>
    </div>
@stop