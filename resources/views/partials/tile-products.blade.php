@foreach($products->chunk(4) as $chunks)
    <div class="row">
        @foreach($chunks as $product)
          <div class="col-xs-6 col-md-3">
            <div class="Card">
              <a href="{{route('categories.{id}.products.show', [$product->category_id, $product->id])}}">
                  <img src="{{ $product->photo_id ? $product->photo->getImage() : default_img() }}" class="Card__Image" alt="...">
                </a>
                <span class="Card__Title">{{ $product->name }}</span>
                <small>Model: {{ $product->model_no }} </small>
            </div>
          </div>
        @endforeach
    </div>
@endforeach