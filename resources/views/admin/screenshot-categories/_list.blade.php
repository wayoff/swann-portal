<ul class="" style="">
    <li class="">
        <span class="btn">
            @if(!$category->children->isEmpty())
                <i class="glyphicon glyphicon-minus-sign"></i>
            @endif
                <form action="{{route('admin.screenshot-categories.destroy', [$category->id])}}" method="POST" class="pull-right" style="margin-left: 5px;">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}

                    <a href="#" class="btn-submit btn-action" title="Delete" data-toggle="tooltip">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>

                    <a href="{{route('admin.screenshot-categories.edit', [$category->id])}}" title="Edit" data-toggle="tooltip" class="btn-action">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>

                    <a href="/admin/screenshot-categories/create?parent={{$category->id}}" title="Add" data-toggle="tooltip" class="btn-action">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>

                </form>
            {{$category->name}}
        </span>

        @foreach($category->children->sortBy('order')->all() as $category)
            @include('admin.screenshot-categories._list', ['category' => $category])
        @endforeach
    </li>
</ul>
