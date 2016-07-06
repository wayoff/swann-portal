@php 
    $genSpecifications = $product->specifications()->get();
@endphp
@foreach($product->specificationCategories as $category)
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
                                    <td>
                                        <strong>
                                            {{ $specification->name}}
                                        </strong>
                                    </td>
                                    @if($specs = $genSpecifications->where('pivot.specification_id', $specification->id)->first())
                                        <td>
                                            @if($specs->pivot->link_to)
                                                <a href="{{$specs->pivot->link_to}}" target="_blank">
                                                    {{$specs->pivot->value}}
                                                </a>
                                            @else
                                                {{$specs->pivot->value}}
                                            @endif
                                        </td>
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