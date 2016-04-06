@extends('admin.layouts.content')

@section('Page__Description')
    Products / Procedures
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-book"></i>  <a href="{{ route('admin.products.index') }}">Products</a>
        </li>

        <li>
            <a href="#">{{ $product->name }}</a>
        </li>

        <li>
            <a href="{{ route('admin.products.{id}.procedures.index', $product->id) }}"> Procedures </a>
        </li>
        <li class="active">
            <a href="#"> Edit Procedure</a>
        </li>
    </ol>
@stop

@section('Content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Procedure</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.{id}.procedures.update', [$product->id, $procedure->id]) }}">
                    {!! csrf_field() !!}
                    {!! method_field('PUT') !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ $procedure->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Document</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="document" >

                            @if ($errors->has('document'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('document') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    @if($procedure->document_id)
                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Document</label>

                            <div class="col-md-6">
                                <a href="{{ $procedure->document->getDocument() }}" class="btn btn-default" target="_blank">
                                    {{ $procedure->document->name . '.' . $procedure->document->extension }}
                                </a>
                            </div>
                        </div>
                    @endif
<!-- 
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="table-step">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>File</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="step_title[]" required>
                                        </td>
                                        <td>
                                            <textarea class="form-control" name="step_content[]" required></textarea>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control" name="step_document[]" >
                                        </td>
                                        <td>
                                            <input type="file" class="form-control" name="step_image[]" >
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-add-row">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-table"></i> Register
                            </button>
                        </div>
                    </div>
                    
                    <hr>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@stop
{{-- 
@section('footer')
    <script>
        function registerRemoveBtn() {
            $('.btn-remove').on('click', function() {
                var id = $(this).data('id');
                $('#' + id).remove();
            });
        }

        function generateRow() {
            return '<tr> ' +
                        '<td> <input type="text" class="form-control" name="step_title[]" required> </td>' +
                        '<td> <textarea class="form-control" name="step_content[]" required></textarea> </td>' +
                        '<td> <input type="file" class="form-control" name="step_document[]" > </td>' +
                        '<td> <input type="file" class="form-control" name="step_image[]" > </td>' +
                        '<td> <button type="button" class="btn btn-primary btn-add-row">Add Row</button> </td>' +
                    '</tr>';

        }

        $( function() {
            $('.btn-add-row').on('click', function() {
                $('#table-step').append(generateRow())
                registerRemoveBtn();
            });
        });
    </script>
@stop
--}}