@if(isset($procedureCategories))
    <div class="row">
        <div class="col-md-12">
            @foreach($procedureCategories->sortBy('name') as $key => $procedureCategory)
                @if($procedures->where('procedure_category_id', $procedureCategory->id)->first())
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="cursor: pointer;" data-toggle="collapse" data-target="#procedure_{{$procedureCategory->id}}">
                            <h3 class="panel-title">{{$procedureCategory->name}}</h3>
                        </div>
                        <div class="panel-body collapse {{$key === 0 ? 'in' : ''}}" id="procedure_{{$procedureCategory->id}}">
                            @php
                                $list = $procedures->where('procedure_category_id', $procedureCategory->id)->all();
                            @endphp

                            @foreach($list as $procedure)
                                <div class="Product__Show--Procedure-Container">
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
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-md-12">
            @if($procedures->where('procedure_category_id', 0)->first())
                <div class="panel panel-primary">
                    <div class="panel-heading" style="cursor: pointer;" data-toggle="collapse" data-target="#procedure_other">
                        <h3 class="panel-title"> Other Trouble Shooting</h3>
                    </div>
                    <div class="panel-body collapse in" id="procedure_other">
                        @php
                            $list = $procedures->where('procedure_category_id', 0)->all();
                        @endphp

                        @foreach($list as $procedure)
                            <div class="Product__Show--Procedure-Container">
                                <span class="Product__Show--Procedure-Title None"> 
                                    {{ $procedure->name }}
                                </span>
                                <div class="row">
                                    <div class="col-md-12 padding-10">
                                        @if($procedure->document_id)
                                            <a href="{{$procedure->document->getDocument()}}" class="btn btn-primary margin-10"> View Supporting Document</a>
                                            <br />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@else
    @foreach($procedures as $procedure)
        <div class="Product__Show--Procedure-Container">
            <span class="Product__Show--Procedure-Title None"> 
                {{ $procedure->name }}
            </span>
            <div class="row">
                <div class="col-md-12 padding-10">
                    @if($procedure->document_id)
                        <a href="{{$procedure->document->getDocument()}}" class="btn btn-primary margin-10"> View Supporting Document</a>
                        <br />
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endif