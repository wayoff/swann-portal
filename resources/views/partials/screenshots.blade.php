@if($product->screenshots->isEmpty())
    <div class="alert alert-info">
        No Screenshot yet
    </div>
@else
    @foreach($screenshotCategories as $screenshotCategory)
        @php
            $screenshots = $product->screenshots()->where('category_id', $screenshotCategory->id)->get();
        @endphp
        @if(!$screenshots->isEmpty())
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> {{$screenshotCategory->name}} </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($screenshots as $screenshot)
                            <div class="col-md-3">
                                <div class="Card">
                                    <span class="Card__Title">
                                        {{$screenshot->name}}
                                    </span>
                                    <div class="text-center">
                                        <a href="{{$screenshot->photo->getImage()}}">
                                            <img src="{{$screenshot->photo->getImage()}}" style="width: 100%">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif