@php 
    $genSpecifications = $product->specifications()->get();
@endphp
@foreach($product->categories as $category)
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $category->name }}</h3>
        </div>
        <div class="panel-body">
            @if($category->specifications->count() === 0)
                <div class="alert alert-info">
                    No specification
                </div>
            @else
                <div class="col-md-12">
                    <table class="table table-hover">
                        <tbody>
                            @foreach($category->specifications as $specification)
                                <tr>
                                    <td>{{ $specification->name}}</td>
                                    @if($specs = $genSpecifications->where('pivot.specification_id', $specification->id)->first())
                                        <td>{{$specs->pivot->value}}</td>
                                    @else
                                        <td>  </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endforeach