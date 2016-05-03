@if($randomProducts->isEmpty())
    <div class="alert alert-info">
        No Products yet
    </div>
@else
    @foreach($randomProducts->chunk(3) as $chunks)
        <div class="row">
            @foreach($chunks as $randomProduct)
            <div class="col-md-4">
                <div class="Card">
                    <a href="{{route('categories.{id}.products.show', [$randomProduct->firstCategory()->id, $randomProduct->id])}}">
                        <img src="{{ $randomProduct->photo->getImage() }}" class="Card__Image" alt="image">
                    </a>
                    <h5>{{ str_limit($randomProduct->name, 30) }}</h5>
                    <p>
                        {{ str_limit($randomProduct->description, 60) }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    @endforeach
@endif