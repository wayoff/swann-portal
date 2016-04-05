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

                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut error officia placeat, illo alias cum minima dignissimos accusantium earum, incidunt quasi, aspernatur maxime! Atque laudantium, odit consequuntur quas sunt, deserunt?
                </p>
                @if($question->document_id)
                    <a href="{{$question->document->getDocument()}}" class="btn btn-primary" target="_blank"> View Supporting Document</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>