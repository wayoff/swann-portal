@if(isset($procedureCategories))
    <div class="row">
        <div class="col-md-12">
            @foreach($procedureCategories->where('parent_id', 0)->sortBy('order') as $key => $parent)
                @if(!$procedureCategories->where('parent_id', $parent->id)->sortBy('order')->isEmpty())
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="cursor: pointer;" data-toggle="collapse" data-target="#procedure_{{$parent->id}}">
                            <h3 class="panel-title"> {{ ucwords($parent->name)}} </h3>
                        </div>
                        <div class="panel-body collapse" id="procedure_{{$parent->id}}">
                            @foreach($procedureCategories->where('parent_id', $parent->id)->sortBy('order') as $key => $procedureCategory)
                                @if($procedures->where('procedure_category_id', $procedureCategory->id)->first())
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="cursor: pointer;" data-toggle="collapse" data-target="#procedure_{{$procedureCategory->id}}">
                                        <h3 class="panel-title">{{$procedureCategory->name}}</h3>
                                    </div>
                                    <div class="panel-body collapse" id="procedure_{{$procedureCategory->id}}">
                                        @php
                                            $list = $procedures->where('procedure_category_id', $procedureCategory->id)->all();
                                        @endphp
                                            @include('partials._troubleshooting_listing')
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
    
                @if($procedures->where('procedure_category_id', $parent->id)->first())
                    <div class="panel panel-default">
                        <div class="panel-heading" style="cursor: pointer;" data-toggle="collapse" data-target="#procedure_{{$parent->id}}">
                            <h3 class="panel-title">{{$parent->name}}</h3>
                        </div>
                        <div class="panel-body collapse" id="procedure_{{$parent->id}}">
                            @php
                                $list = $procedures->where('procedure_category_id', $parent->id)->all();
                            @endphp
                            @include('partials._troubleshooting_listing')
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-md-12">
            @if($procedures->where('procedure_category_id', 0)->first())
                <div class="panel panel-default">
                    <div class="panel-heading" style="cursor: pointer;" data-toggle="collapse" data-target="#procedure_other">
                        <h3 class="panel-title"> Other Trouble Shooting</h3>
                    </div>
                    <div class="panel-body collapse in" id="procedure_other">
                        @php
                            $list = $procedures->where('procedure_category_id', 0)->all();
                        @endphp
                        @include('partials._troubleshooting_listing')
                    </div>
                </div>
            @endif
        </div>
    </div>
@else
    @php
        $list = $procedures;
    @endphp
    @include('partials._troubleshooting_listing')
@endif