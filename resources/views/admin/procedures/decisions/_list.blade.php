<ul class="" style="">
    <li class="">
        <span class="btn">
            @if(!$decision->children->isEmpty())
                <i class="glyphicon glyphicon-minus-sign"></i>
            @endif
                <form action="{{route('admin.procedures.{id}.decisions.destroy', [$procedure->id, $decision->id])}}" method="POST" class="pull-right" style="margin-left: 5px;">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}

                    <a href="#" class="btn-submit btn-action" title="Delete" data-toggle="tooltip">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>

                    <a href="{{route('admin.procedures.{id}.decisions.edit', [$procedure->id, $decision->id])}}" title="Edit" data-toggle="tooltip" class="btn-action">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>


                    <a href="/admin/procedures/{{$decision->procedure_id}}/decisions/create?parent={{$decision->id}}" title="Add" data-toggle="tooltip" class="btn-action">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>

                </form>
            {{$decision->title}}
        </span>

            @foreach($decision->children as $child)
                @include('admin.procedures.decisions._list', ['decision' => $child])
            @endforeach
    </li>
</ul>
