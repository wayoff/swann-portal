@extends('admin.layouts.content')

@section('Page__Description')
    Footer
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-file"></i>  <a href="#">Footer</a>
        </li>
    </ol>
@stop

@section('Content')
    @php
        $left = $footers->where('position', 1)->first();
    @endphp
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Footer Content</h3>
            </div>
            <div class="panel-body">
                {!! $left->content !!}
            </div>
            <div class="panel-footer">
                <a href="/admin/footers/{{$left->id}}/edit" class="btn btn-default btn-block   ">
                    Update
                </a>
            </div>
        </div>
        {{-- @foreach($footers as $footer)
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            @if($footer->position == 1)
                                Left
                            @elseif($footer->position == 2)
                                Middle
                            @else
                                Right
                            @endif
                        </h3>
                    </div>
                    <div class="panel-body">
                        {!! $footer->content !!}
                    </div>
                    <div class="panel-footer">
                        <a href="/admin/footers/{{$footer->id}}/edit" class="btn btn-default btn-block   ">
                            Update
                        </a>
                    </div>
                </div>
            </div>
        @endforeach --}}
    </div>
@stop