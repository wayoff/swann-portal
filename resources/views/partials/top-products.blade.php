<style>
    .Featured__Product--title {
        font-family: Verdana, Geneva, sans-serif;
        font-weight: bold;
    }

    .Featured__Product--description {
        color: #666666 !important;
    }
</style>
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
                <a href="{{route('categories.{id}.products.show', [$topProduct->firstCategory()->id, $topProduct->id])}}" class="list-group-item">
                    <h6 class="list-group-item-heading Featured__Product--title">{{ str_limit($topProduct->name, 30) }}</h6>
                </a>
            @endforeach
        @endif
    </div>
</div>