@if($randomProducts->isEmpty())
    <div class="alert alert-info">
        No Products yet
    </div>
@else
    @foreach($randomProducts as $randomProduct)
        <div class="col-md-4">
            <div class="Card">
                <a href="{{route('categories.{id}.products.show', [$randomProduct->firstCategory()->id, $randomProduct->id])}}">
                    <img src="{{ $randomProduct->photo->getImage() }}" width="174" height="160" alt="image">
                </a>
                <h5>{{ $randomProduct->name }}</h5>
                <p>
                    {{ str_limit($randomProduct->description, 60) }}
                </p>
            </div>
        </div>
    @endforeach
@endif