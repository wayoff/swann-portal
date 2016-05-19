@extends('admin.layouts.content')

@section('Page__Description')
    OP&P's Categories
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-table"></i>  <a href="/admin/schedules">Schedules</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        @if(empty($schedule))
            <form action="{{route('admin.schedules.store')}}" method="POST" enctype="multipart/form-data" class="form-inline" role="form">
            {!! csrf_field() !!}
                <div class="form-group">
                    <label class="sr-only" for="">Document</label>
                    <input type="file" class="form-control" name="document" >

                    @if ($errors->has('document'))
                        <span class="help-block">
                            <strong>{{ $errors->first('document') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @else
            <form action="{{route('admin.schedules.update', $schedule->id)}}" method="POST" enctype="multipart/form-data" class="form-inline" role="form">
            
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}
                <div class="form-group">
                    <label class="sr-only" for="">Document</label>
                    <input type="file" class="form-control" name="document" >

                    @if ($errors->has('document'))
                        <span class="help-block">
                            <strong>{{ $errors->first('document') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        @endif

        @if(!empty($schedule))
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="{{$schedule->document->getDocument()}}"></iframe>
            </div>
        @endif
    </div>
@stop