@extends('layouts.descriptive-content')

@section('content')
    <div class="row">
      <div class="col-md-12 text-center">
          <form class="navbar-form" action="/search" method="GET" role="search">
              <div class="input-group Form__Search--Container">
                  <input 
                    type="text"
                    class="form-control typeahead"
                    placeholder="Search"
                    name="q"
                    data-provide="typeahead"
                    autocomplete="off"
                    value="{{$q}}">
                  <div class="input-group-btn Form__Search--Container--button">
                      <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
              </div>
          </form>
      </div>

      <div class="col-md-12">
          @if(!empty($q) && $searches->isEmpty())
            <div class="alert alert-info">
                No Data was found
            </div>

          @else
            <div class="row">
                @foreach($searches as $searchable)
                    <div class="col-md-12">
                        @php
                            $contents = $searchable->switcher();
                        @endphp
                        @foreach($contents as $content)
                            <div class="Question">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-2 Question__Number--Container">
                                        <span class="Question__Number">{{$content->icon()}}</span>
                                    </div>
                                    <div class="col-md-10 col-sm-8 col-xs-8">
                                        <h4 class="Question__Title">{{$content->title()}}</h4>
                                        <p class="Question__Description">
                                            {!! $content->description()!!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    {{$searches->render()}}
                </div>
            </div>
          @endif
      </div>
    </div>
@stop