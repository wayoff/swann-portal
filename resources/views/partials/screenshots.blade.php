@if($product->screenshots->isEmpty())
    <div class="alert alert-info">
        No Screenshot yet
    </div>
@else
    @foreach($screenshotCategories as $screenshotCategory)
        @php
            $screenshots = $product->screenshots()->where('category_id', $screenshotCategory->id)->with('photo')->orderBy('order')->get();
        @endphp
        @if(!$screenshots->isEmpty())
            <div class="panel panel-primary">
                @php
                    $id = str_random(17);
                @endphp
                <div class="panel-heading" style="cursor: pointer" data-target="#{{$id}}" data-toggle="collapse">
                    <h3 class="panel-title"> {{$screenshotCategory->name}} </h3>
                </div>
                <div class="panel-body collapse gallery" id="{{$id}}">
                    @foreach($screenshots->chunk(4) as $chunks)
                        <div class="row">
                            @foreach($chunks as $screenshot)
                                <div class="col-md-3">
                                    <div class="Card">
                                        <span class="Card__Title">
                                            {{$screenshot->name}}
                                        </span>
                                        <div class="text-center">
                                            <a href="{{$screenshot->photo->getImage()}}" class="image-link">
                                                <img src="{{$screenshot->photo->getImage()}}" style="width: 100%">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endif