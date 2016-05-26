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
                        @foreach($screenshots as $screenshot)
                            <div class="Card">
                                <span class="Card__Title">
                                    {{$screenshot->name}}
                                </span>
                                <div class="text-center">
                                    <img src="{{$screenshot->photo->getImage()}}" style="width: 100%;max-width: 500px">
                                </div>

                            </div>
                        @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endif