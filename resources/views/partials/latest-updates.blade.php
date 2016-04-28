<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"> Latest Updates</h3>
  </div>
  <div class="panel-body">
      @if($latestUpdates->isEmpty())
        <div class="alert alert-info">
            No Updates Yet
        </div>
      @else
        @foreach($latestUpdates as $latestUpdate)
            <div class="media Home__Media">
                <a class="pull-left" href="{{ route('news.show', $latestUpdate->id) }}">
                    <img class="media-object Home__Media--object" 
                        src="{{ $latestUpdate->photo_id 
                                  ? $latestUpdate->photo->getImage() 
                                  : $latestUpdate->document_id
                                      ? config('swannportal.path.document-icon')
                                      : config('swannportal.path.default-img') }}" alt="Image">
                </a>
                <div class="media-body">
                    <h5 class="media-heading">
                        {{ $latestUpdate->title }}
                    </h5>
                    <p>{{ str_limit($latestUpdate->content, 50) }}</p>
                </div>
            </div>
        @endforeach
    @endif
  </div>
</div>