@extends('layouts.descriptive-content')

@section('Page__Title', 'Product Listing')

@section('content')
    @if($products->isEmpty())
        <div class="alert alert-warning">
            <strong>No Products Yet</strong>
        </div>
    @else
        <div class="row">
          <div class="col-md-12 text-center">
              <form class="navbar-form" action="{{route('products.index')}}" role="search">
                  <div class="input-group Form__Search--Container">
                      <input type="text" class="form-control" placeholder="Search" name="q" value="{{$q}}">
                      <div class="input-group-btn Form__Search--Container--button">
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
@stop