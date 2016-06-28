@extends('admin.layouts.content')

@section('Page__Description')
    Screenshot Categories
@stop

@section('Content')
    <div class="col-md-offset-1 col-md-10">
        <div class="pull-right">
            <a href="{{ route('admin.screenshot-categories.create') }}" class="btn btn-primary">
                Create New Category
            </a>
        </div>

        <div class="tree">
            @foreach($categories->sortBy('order')->all() as $category)
                @include('admin.screenshot-categories._list', ['category' => $category])
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