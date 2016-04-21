@if(isset($procedureCategories))
    <div class="row">
        <div class="col-md-12">
            @foreach($procedureCategories as $procedureCategory)
                @if($procedures->where('procedure_category_id', $procedureCategory->id)->first())
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$procedureCategory->name}}</h3>
                    </div>
                    <div class="panel-body">
                        @php
                            $list = $procedures->where('procedure_category_id', $procedureCategory->id)->all();
                        @endphp

                        @foreach($list as $procedure)
                            <div class="Product__Show--Procedure-Container">
                                <span class="Product__Show--Procedure-Title None"> 
                                    {{ $procedure->name }}
                                    <!-- <button class="pull-right btn btn-xs btn-primary" data-toggle="collapse" data-target="#procedure_{{$procedure->id}}"> Toggle </button> -->
                                </span>
                                <div class="row">
                                    <div class="col-md-12 padding-10">
                                        @if($procedure->document_id)
                                            <a href="{{$procedure->document->getDocument()}}" class="btn btn-success margin-10"> View Supporting Document</a>
                                            <br />
                                        @endif
                                    </div>
                                    <!-- <div id="procedure_{{ $procedure->id }}" class="collapse">
                                        @foreach($procedure->steps as $key => $step)
                                            <div class="col-md-12">
                                                <div class="Product__Show--Step-Container Question">
                                                    <div class="row">
                                                        <div class="col-md-2 padding-remove">
                                                            <div class="Question__Number--Container">
                                                                <span class="Question__Number">{{$key + 1}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 padding-remove">
                                                            <span class="Product__Show--Step-Title"> {{ $step->title }}</span>

                                                            <div class="Product__Show--Step-Content">
                                                                <p>{{$step->content}}</p>
                                                                <div>
                                                                    @if($step->document_id)
                                                                        <a href="{{$step->document->getDocument()}}" class="btn btn-primary margin-10"> View Supporting Document</a>
                                                                        <br />
                                                                    @endif
                                                                    @if($step->photo_id)
                                                                        <img src="{{$step->photo->getImage()}}" alt="" class="Product__Show--Step-Content-Image">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div> -->
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
                    <div class="panel-heading">
                        <h3 class="panel-title"> Other Trouble Shooting</h3>
                    </div>
                    <div class="panel-body">
                        @php
                            $list = $procedures->where('procedure_category_id', 0)->all();
                        @endphp

                        @foreach($list as $procedure)
                            <div class="Product__Show--Procedure-Container">
                                <span class="Product__Show--Procedure-Title None"> 
                                    {{ $procedure->name }}
                                    <!-- <button class="pull-right btn btn-xs btn-primary" data-toggle="collapse" data-target="#procedure_{{$procedure->id}}"> Toggle </button> -->
                                </span>
                                <div class="row">
                                    <div class="col-md-12 padding-10">
                                        @if($procedure->document_id)
                                            <a href="{{$procedure->document->getDocument()}}" class="btn btn-primary margin-10"> View Supporting Document</a>
                                            <br />
                                        @endif
                                    </div>
                                    <!-- <div id="procedure_{{ $procedure->id }}" class="collapse">
                                        @foreach($procedure->steps as $key => $step)
                                            <div class="col-md-12">
                                                <div class="Product__Show--Step-Container Question">
                                                    <div class="row">
                                                        <div class="col-md-2 padding-remove">
                                                            <div class="Question__Number--Container">
                                                                <span class="Question__Number">{{$key + 1}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 padding-remove">
                                                            <span class="Product__Show--Step-Title"> {{ $step->title }}</span>

                                                            <div class="Product__Show--Step-Content">
                                                                <p>{{$step->content}}</p>
                                                                <div>
                                                                    @if($step->document_id)
                                                                        <a href="{{$step->document->getDocument()}}" class="btn btn-primary margin-10"> View Supporting Document</a>
                                                                        <br />
                                                                    @endif
                                                                    @if($step->photo_id)
                                                                        <img src="{{$step->photo->getImage()}}" alt="" class="Product__Show--Step-Content-Image">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div> -->
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
                <!-- <button class="pull-right btn btn-xs btn-primary" data-toggle="collapse" data-target="#procedure_{{$procedure->id}}"> Toggle </button> -->
            </span>
            <div class="row">
                <div class="col-md-12 padding-10">
                    @if($procedure->document_id)
                        <a href="{{$procedure->document->getDocument()}}" class="btn btn-primary margin-10"> View Supporting Document</a>
                        <br />
                    @endif
                </div>
                <!-- <div id="procedure_{{ $procedure->id }}" class="collapse">
                    @foreach($procedure->steps as $key => $step)
                        <div class="col-md-12">
                            <div class="Product__Show--Step-Container Question">
                                <div class="row">
                                    <div class="col-md-2 padding-remove">
                                        <div class="Question__Number--Container">
                                            <span class="Question__Number">{{$key + 1}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 padding-remove">
                                        <span class="Product__Show--Step-Title"> {{ $step->title }}</span>

                                        <div class="Product__Show--Step-Content">
                                            <p>{{$step->content}}</p>
                                            <div>
                                                @if($step->document_id)
                                                    <a href="{{$step->document->getDocument()}}" class="btn btn-primary margin-10"> View Supporting Document</a>
                                                    <br />
                                                @endif
                                                @if($step->photo_id)
                                                    <img src="{{$step->photo->getImage()}}" alt="" class="Product__Show--Step-Content-Image">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> -->
            </div>
        </div>
    @endforeach
@endif