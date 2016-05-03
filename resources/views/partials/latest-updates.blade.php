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
                    @php
                      $image = $latestUpdate->photo_id 
                                  ? $latestUpdate->photo->getImage() 
                                  : null;
                      if(is_null($image)) {
                          $image = $latestUpdate->document_id
                                      ? config('swannportal.path.document-icon')
                                      : config('swannportal.path.default-img');
                      }
                    @endphp
                    <img 
                        class="media-object Home__Media--object" 
                        src="{{ $image }}"
                        alt="Image">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">
                        {{ $latestUpdate->title }}
                    </h4>
                    <p>{{ str_limit($latestUpdate->content, 50) }}</p>
                </div>
            </div>
        @endforeach
    @endif
  </div>
</div>