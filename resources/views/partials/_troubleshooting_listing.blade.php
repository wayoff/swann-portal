@foreach($list as $procedure)
    <ul class="list-unstyled list-hover">
        <li>
                @if($procedure->document_id)
                    <a href="{{$procedure->document->getDocument()}}" 
                        class="btn-xs btn btn-success" 
                        data-toggle="tooltip" 
                        data-placement="top"
                        title="Supporting Document"
                    >
                        <span class="glyphicon glyphicon-file"></span>
                    </a>
                @endif

                @if(!$procedure->trees->isEmpty())
                    <a href="/decision/{{$procedure->id}}" 
                        target="_blank" 
                        class="btn-xs btn btn-info" 
                        data-toggle="tooltip" 
                        data-placement="top"
                        title="Decision Tree"
                    >
                        <span class="glyphicon glyphicon-question-sign"></span>
                    </a>
                @endif
            &nbsp; {{ $procedure->name }} 
        </li>
    </ul>
    <!-- <div class="Product__Show--Procedure-Container">
        <span class="Product__Show--Procedure-Title None"> 
            {{ $procedure->name }}
        </span>
        <div class="row">
            <div class="col-md-12 padding-10">
                @if($procedure->document_id)
                    <a href="{{$procedure->document->getDocument()}}" class="btn btn-success margin-10"> Supporting Document</a>
                @endif
                @if(!$procedure->trees->isEmpty())
                    <a href="/decision/{{$procedure->id}}" target="_blank" class="btn btn-info margin-10"> Decision Tree </a>
                @endif
            </div>
        </div>
    </div> -->
@endforeach
