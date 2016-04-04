@if($randomProducts->isEmpty())
    <div class="col-md-4">
        <img src="http://placehold.it/174x126" alt="image">
        <h5>Title</h5>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </p>
    </div>
    <div class="col-md-4">
        <img src="http://placehold.it/174x126" alt="image">
        <h5>Title</h5>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </p>
    </div>
    <div class="col-md-4">
        <img src="http://placehold.it/174x126" alt="image">
        <h5>Title</h5>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </p>
    </div>

@else
    @foreach($randomProducts as $randomProduct)
        <div class="col-md-4">
            <img src="{{ $randomProduct->photo->getImage() }}" width="174" height="126" alt="image">
            <h5>{{ $randomProduct->name }}</h5>
            <h6>{{ $randomProduct->model }}</h6>
            <p>
                {{ str_limit($randomProduct->description, 60) }}
            </p>
        </div>
    @endforeach
@endif