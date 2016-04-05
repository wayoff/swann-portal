<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Featured Products</h3>
    </div>
    <div class="panel-body">
        @if($topProducts->isEmpty())
            <div class="alert alert-info">
                No Featured Products Yet
            </div>
        @else
            @foreach($topProducts as $topProduct)
                <a href="{{route('categories.{id}.products.show', [$topProduct->category_id, $topProduct->id])}}" class="list-group-item">
                    <h5 class="list-group-item-heading">{{ $topProduct->name }}</h5>
                    <p class="list-group-item-text">{{ str_limit($topProduct->description, 50) }}</p>
                </a>
            @endforeach
        @endif
    </div>
</div>