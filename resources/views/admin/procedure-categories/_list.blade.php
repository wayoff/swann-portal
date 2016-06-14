<ul class="" style="">
    <li class="">
        <span class="btn">
            @if(!$procedureCategory->children->isEmpty())
                <i class="glyphicon glyphicon-minus-sign"></i>
            @endif
                <form action="{{route('admin.procedure-categories.{id}.destroy', [$procedureCategory->id, $decision->id])}}" method="POST" class="pull-right" style="margin-left: 5px;">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}

                    <a href="#" class="btn-submit btn-action" title="Delete" data-toggle="tooltip">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>

                    <a href="{{route('admin.procedure-categories.{id}.edit', [$procedureCategory->id, $decision->id])}}" title="Edit" data-toggle="tooltip" class="btn-action">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>


                    <a href="/admin/procedures/{{$procedureCategory->procedure_id}}/create?parent={{$procedureCategory->id}}" title="Add" data-toggle="tooltip" class="btn-action">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>

                </form>
            {{$procedureCategory->title}}
        </span>

        @foreach($procedureCategory->children as $procedureCategory)
            @include('admin.procedures-categories._list', ['procedureCategory' => $procedureCategory])
        @endforeach
    </li>
</ul>
