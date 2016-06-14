@extends('admin.layouts.content')

@section('Page__Description')
    Trouble Shooting Categories
@stop

@section('Breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-table"></i>  <a href="/admin/procedure-categories">Trouble Shooting Categories</a>
        </li>
    </ol>
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="tree">
            @foreach($procedureCategories->sortBy('order')->all() as $procedureCategory)
                @include('admin.procedure-categories._list', ['procedureCategory', $procedureCategory])
            @endforeach
        </div>
    </div>
@stop


@section('footer')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('.btn-submit').on('click', function() {
                if (confirm('Are you sure to delete data?')) {
                    $(this).closest('form').submit();
                }
            });

            $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
            $('.tree li.parent_li > span').on('click', function (e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(":visible")) {
                    children.hide('fast');
                    $(this).attr('title', 'Expand this branch').find(' > i').addClass('glyphicon-plus-sign').removeClass('glyphicon-minus-sign');
                } else {
                    children.show('fast');
                    $(this).attr('title', 'Collapse this branch').find(' > i').addClass('glyphicon-minus-sign').removeClass('glyphicon-plus-sign');
                }
                e.stopPropagation();
            });
        });
    </script>
@stop
