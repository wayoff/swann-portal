<style>
    .Commendation__Body {
      max-height: 300px;
      overflow-y: scroll;
    }
</style>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Commendations</h3>
    </div>
    <div class="panel-body Commendation__Body">
        @if($commendations->isEmpty())
            <div class="alert alert-info">
                No Commendations Yet
            </div>
        @else
            @foreach($commendations as $commendation)
            <div class="paragraph">
              <p>
                <img class="pull-left" src="{{$commendation->photo->getImage()}}" width="80" height="65">{{$commendation->name}}{{$commendation->testimonial}}
              </p>
            </div>
            @endforeach

        @endif
    </div>
</div>