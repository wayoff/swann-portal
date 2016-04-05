@if($randomProducts->isEmpty())
    <div class="alert alert-info">
        No Products yet
    </div>
@else
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Random Products</h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
            @foreach($randomProducts as $randomProduct)
                <a href="{{route('categories.{id}.products.show', [$category->id, $randomProduct->id])}}" class="list-group-item">
                    {{$randomProduct->name}}
                    <small>{{$randomProduct->model_no}}</small>
                </a>
            @endforeach
            </div>
        </div>
    </div>
@endif