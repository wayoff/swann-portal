@extends('layouts.descriptive-content')

@section('Page__Title', 'Operations Policies and Procedures')

@section('content')
<div class="row">
    <div class="col-md-12">
        @foreach($categories->chunk(2) as $chunks)
            <div class="row">
                @foreach($chunks as $category)
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{$category->name}}</h3>
                            </div>
                            <div class="panel-body">
                                @if($category->agreements->isEmpty())
                                    <div class="alert alert-info">
                                        No Data yet
                                    </div>
                                @else
                                    <ul class="list-unstyled">
                                        @foreach($category->agreements as $agreement)
                                            <li>
                                                <a href="#" data-id="{{$agreement->id}}" class="agreement"> 
                                                <i class="glyphicon glyphicon-chevron-right"></i> {{$agreement->title}} 
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
@stop

@section('footer')
    <div class="modal fade" id="agreement_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="agreement_modal_title"></h4>
                </div>
                <div class="modal-body">
                    <div id="agreement_modal_content"></div>
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" id="agreement_modal_pdf"></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="agreement_modal_btn_primary">Agree</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $( function() {
            var modalPrefix = '#agreement_modal',
                pathPrefix = '/api/agreements';
            var btnPrimary = modalPrefix + '_btn_primary';
            
            $('.agreement').on('click', function() {
                var id = $(this).data('id');
                $.get(pathPrefix + '/show', { id: id})
                 .success( function(response) {
                    console.log(response.agreed);
                    if (response.agreed === null) {
                        $(btnPrimary).show();
                    } else {
                        $(btnPrimary).hide();
                    }
                    $(modalPrefix).modal('show');
                    $(btnPrimary).attr('data-id', response.id);
                    $(modalPrefix+'_title').html(response.title);
                    $(modalPrefix+'_content').html('<p>' + response.content + '</p>');
                    $(modalPrefix+'_pdf').attr('src', response.document);
                 })
                 .error( function(err) {
                    console.log(err);
                    alert('Oops something went wrong. Please try again');
                 });
            });

            $( btnPrimary ).on('click', function() {
                var _this = $(this);
                var id = $(this).data('id');
                $.get(pathPrefix + '/agreed', {id : id})
                 .success( function(response) {
                    _this.hide();
                 })
                 .error( function(err) {
                    console.log(err);
                    alert('Oops something went wrong. Please try again');
                 });
            });
        });
    </script>
@stop