@if(isset($faqCategories))
    <div class="row">
        <div class="col-md-12">
            @foreach($faqCategories as $faqCategory)
                @if($questions->where('faq_category_id', $faqCategory->id)->first())
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$faqCategory->name}}</h3>
                        </div>
                        <div class="panel-body">
                            @php
                                $faqQuestions = $questions->where('faq_category_id', $faqCategory->id)->all();
                                $num = 0;
                            @endphp
                            @foreach($faqQuestions as $key => $question)
                                <div class="col-md-12 Question">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2 Question__Number--Container">
                                            <span class="Question__Number">{{$num+= 1}}</span>
                                        </div>
                                        <div class="col-md-10 col-sm-8 col-xs-8">
                                            <h4 class="Question__Title">{{$question->title}}</h4>
                                            <p class="Question__Description">
                                                {{$question->answer}}
                                            </p>
                                            @if($question->document_id)
                                                <a href="{{$question->document->getDocument()}}" class="btn btn-primary" target="_blank"> View Supporting Document</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            @if($questions->where('faq_category_id', 0)->first())
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Other FAQ's</h3>
                        </div>
                        <div class="panel-body">
                            @php
                                $faqQuestions = $questions->where('faq_category_id', 0)->all();
                                $num = 0;
                            @endphp
                            @foreach($faqQuestions as $key => $question)
                                <div class="col-md-12 Question">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2 Question__Number--Container">
                                            <span class="Question__Number">{{$num+= 1}}</span>
                                        </div>
                                        <div class="col-md-10 col-sm-8 col-xs-8">
                                            <h4 class="Question__Title">{{$question->title}}</h4>
                                            <p class="Question__Description">
                                                {{$question->answer}}
                                            </p>
                                            @if($question->document_id)
                                                <a href="{{$question->document->getDocument()}}" class="btn btn-primary" target="_blank"> View Supporting Document</a>
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
    <div class="row">
        @foreach($questions as $key => $question)
        <div class="col-md-12 Question">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2 Question__Number--Container">
                    <span class="Question__Number">{{$key + 1}}</span>
                </div>
                <div class="col-md-10 col-sm-8 col-xs-8">
                    <h4 class="Question__Title">{{$question->title}}</h4>
                    <p class="Question__Description">
                        {{$question->answer}}
                    </p>
                    @if($question->document_id)
                        <a href="{{$question->document->getDocument()}}" class="btn btn-primary" target="_blank"> View Supporting Document</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif