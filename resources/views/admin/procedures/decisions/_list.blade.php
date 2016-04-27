<ul class="list-group" style="margin-top: 5px;">
    <li class="list-group-item">
        {{$decision->title}}

            <form action="{{route('admin.procedures.{id}.decisions.destroy', [$procedure->id, $decision->id])}}" method="POST" class="pull-right" style="margin-left: 5px;">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}

                <button class="btn btn-danger badge btn-delete">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            </form>
            
            <a href="{{route('admin.procedures.{id}.decisions.edit', [$procedure->id, $decision->id])}}" class="btn btn-info badge">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>

            <a href="/admin/procedures/{{$decision->procedure_id}}/decisions/create?parent={{$decision->id}}" class="btn btn-primary badge">
                <span class="glyphicon glyphicon-plus"></span>
            </a>

            @foreach($decision->children as $child)
                @include('admin.procedures.decisions._list', ['decision' => $child])
            @endforeach
    </li>
</ul>