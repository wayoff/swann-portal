@foreach($products->chunk(4) as $chunks)
    <div class="row">
        @foreach($chunks as $product)
          <div class="col-xs-6 col-md-3">
            <div class="Card">
              <a href="{{route('categories.{id}.products.show', [ isset($category) ? $category->id : $product->firstCategory()->id, $product->id])}}">
                  <img src="{{ $product->photo_id ? $product->photo->getImage() : default_img() }}" class="Card__Image" alt="...">
                </a>
                <span class="Card__Title">{{ str_limit($product->name, 40) }}</span>
                <small>Model: {{ str_limit($product->model_no, 20) }} </small>
            </div>
          </div>
        @endforeach
    </div>
@endforeach